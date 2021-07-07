<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\LeaveType;
use Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Notifications\LeaveApplied;
use App\User;

class ApplicationsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Karachi");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasPermission('view_application')) {
            if (Auth::user()->hasRole('team_lead') && !Auth::user()->hasRole('admin')) {
                $leaves = Application::where('team_lead', Auth::user()->id)->latest()->get();
            } else {
                $leaves = Application::latest()->get();
            }
            return view('applications.all')->with('data', $leaves);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function pending()
    {
        if (Auth::user()->hasPermission('view_application')) {
            if (Auth::user()->hasRole('team_lead') && !Auth::user()->hasRole('admin')) {
                $pending_leaves = Application::where('status', 2)
                    ->where('team_lead', Auth::user()->id)
                    ->latest()
                    ->get();
            } else {
                $pending_leaves = Application::where('status', 2)
                    ->latest()
                    ->get();
            }
            return view('applications.pending')->with('data', $pending_leaves);
        } else {
            return redirect()->route(
                'access-denied'
            );
        }
    }

    public function rejected()
    {
        if (Auth::user()->hasPermission('view_application')) {
            if (Auth::user()->hasRole('team_lead') && !Auth::user()->hasRole('admin')) {
                $leaves = Application::where('status', 0)
                    ->where('team_lead', Auth::user()->id)
                    ->latest()
                    ->get();
            } else {
                $leaves = Application::where('status', 0)
                    ->latest()
                    ->get();
            }
            return view('applications.rejected')->with('data', $leaves);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function accepted()
    {
        if (Auth::user()->hasPermission('view_application')) {
            if (Auth::user()->hasRole('team_lead') && !Auth::user()->hasRole('admin')) {
                $leaves = Application::where('status', 1)
                    ->where('team_lead', Auth::user()->id)
                    ->latest()
                    ->get();
            } else {
                $leaves = Application::where('status', 1)
                    ->latest()
                    ->get();
            }
            return view('applications.accepted')->with('data', $leaves);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function view($id)
    {
        if (Auth::user()->hasPermission('view_application')) {
            $leave = Application::find($id);
            $user_ = \App\User::where('id', $leave->status_changed_by)->get();
            $st_by = '';
            if (isset($user_[0])) {
                $st_by = $user_[0]->name;
            }
            $unpaid_leaves = Application::where('user_id', $leave->user_id)->where('unpaid', true)->where('status', 1)->count();
            return view('applications.view')->with('data', $leave)->with('status_changed_by', $st_by)
                ->with('used', $leave->user->used_leave)
                ->with('balance', $leave->user->balance_leave)
                ->with('unpaid', $unpaid_leaves)
                ->with('allowed', $leave->user->allowed_leave);
        } else {
            return redirect()->route('access-denied');
        }
    }

    // public function view_password($id)
    // {
    //     $view_password = user::where('id', $id)
    //     $get_password = if(Auth::user()->hasPermission())
    // }

    public function accept($id)
    {
        if (Auth::user()->hasPermission('accept_application')) {
            $apld_leave = Application::where('id', $id)->first();
            if($apld_leave->status == 1)
            {
                $notification = array(
                    'message' => 'Application already has been accepted!',
                    'alert-type' => 'error'
                );
                return redirect()->route('app-view', ['id' => $apld_leave->id])->with($notification);
            }
            if (strtotime($apld_leave->start_from) <= strtotime(date('Y-m-d'))) {
                $notification = array(
                    'message' => 'Application has been expired!',
                    'alert-type' => 'error'
                );
                return redirect()->route('app-view', ['id' => $apld_leave->id])->with($notification);
            }
            if (!$apld_leave->unpaid) {
                $user_ = User::where('id', $apld_leave->user_id)->get()->first();
                $user_->balance_leave = $user_->balance_leave - $apld_leave->no_of_days;
                $user_->used_leave = $user_->used_leave + $apld_leave->no_of_days;
                $user_->save();
            }
            $leave = Application::where('id', $id)
                ->update(['status' => 1, 'status_changed_by' => Auth::user()->id]);

            $mail_from = $_ENV['MAIL_FROM_ADDRESS'];
            $app = Application::where('id', $id)->get();
            $mail_from_name = $_ENV['MAIL_FROM_NAME'];
            //                Notification::send($app, new LeaveApplied($app, Auth::user()));
            $accepted_by = \App\User::find(Auth::user()->id);
            $applied_user = \App\User::find($app[0]->user_id);
            // Send Email to Team Lead from Employee
            $to_name = $app[0]->user->name;
            $to_email = $app[0]->user->email;
            $data = array('accepted_by' => $accepted_by, 'applied_user' => $applied_user, 'app_id' => $app[0]->id);
            \Illuminate\Support\Facades\Mail::send('mail.accept-reject-leave', $data, function ($message) use ($to_name, $to_email, $mail_from, $mail_from_name) {
                $message->to($to_email, $to_name)
                    ->subject('Leave Accepted');
                $message->from($mail_from, $mail_from_name);
            });
            $notification = array(
                'message' => 'Application Successfully moved to Accepted Leaves!',
                'alert-type' => 'success'
            );
            return redirect('/applications/accepted')->with($notification);
            //        return redirect('/applications/view/'.$id);
        } else {
            return redirect()->route('access-denied');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reject($id)
    {
        if (Auth::user()->hasPermission('reject_application')) {

            $app = Application::where('id', $id)->get()->first();
            if($app->status == 0)
            {
                $notification = array(
                    'message' => 'Application already has been accepted!',
                    'alert-type' => 'error'
                );
                return redirect()->route('app-view', ['id' => $app->id])->with($notification);
            }
            if (strtotime($app->start_from) <= strtotime(date('Y-m-d'))) {
                $notification = array(
                    'message' => 'Application has been expired!',
                    'alert-type' => 'error'
                );
                return redirect()->route('app-view', ['id' => $app->id])->with($notification);
            }
            if ($app->status == 1 && $app->unpaid == false) {
                $user_ = User::where('id', $app->user_id)->get()->first();
                $user_->used_leave = $user_->used_leave - $app->no_of_days;
                $user_->balance_leave = $user_->allowed_leave - $user_->used_leave;
                $user_->save();
            }
            $leave = Application::where('id', $id)->update(['status' => 0, 'status_changed_by' => Auth::user()->id]);

            $mail_from = $_ENV['MAIL_FROM_ADDRESS'];
            $mail_from_name = $_ENV['MAIL_FROM_NAME'];
            //                Notification::send($app, new LeaveApplied($app, Auth::user()));
            $rejected_by = \App\User::find(Auth::user()->id);
            $applied_user = \App\User::find($app->user_id);
            // Send Email to Team Lead from Employee
            $to_name = $app->user->name;
            $to_email = $app->user->email;
            $data = array('rejected_by' => $rejected_by, 'applied_user' => $applied_user, 'app_id' => $app->id);
            \Illuminate\Support\Facades\Mail::send('mail.accept-reject-leave', $data, function ($message) use ($to_name, $to_email, $mail_from, $mail_from_name) {
                $message->to($to_email, $to_name)
                    ->subject('Leave Rejected');
                $message->from($mail_from, $mail_from_name);
            });
            $notification = array(
                'message' => 'Application Successfully moved to Rejected Leaves !',
                'alert-type' => 'success'
            );
            return redirect('/applications/rejected')->with($notification);
        } else {
            return redirect()->route('access-denied');
        }
    }
}
