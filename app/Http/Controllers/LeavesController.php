<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\User;
use App\LeaveType;
use Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Notifications\LeaveApplied;

class LeavesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show All Leaves Applied
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function allLeaves()
    {
        $leaves = Application::where('user_id', Auth::user()->id)->latest()->get();
        return view('leaves.all')->with('data', $leaves);
    }

    /**

     * Show Pending Leaves Applied
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pendingLeaves()
    {
        $pending_leaves = Application::where('status', 2)->where('user_id', Auth::user()->id)
            ->latest()
            ->get();
        return view('leaves.pending')->with('data', $pending_leaves);
    }

    public function rejectedLeaves()
    {
        $leaves = Application::where('status', 0)
            ->where('user_id', Auth::user()->id)
            ->latest()
            ->get();
        return view('leaves.rejected')->with('data', $leaves);
    }

    public function acceptedLeaves()
    {
        $leaves = Application::where('status', 1)
            ->where('user_id', Auth::user()->id)
            ->latest()
            ->get();
        return view('leaves.accepted')->with('data', $leaves);
    }

    public function viewLeave($id)
    {
        $leave = Application::find($id);
            $user_ = \App\User::where('id', $leave->status_changed_by)->get();
            $st_by = '';
            if (isset($user_[0])) {
                $st_by = $user_[0]->name;
            }
            $unpaid_leaves = Application::where('user_id', $leave->user_id)->where('unpaid', true)->count();
            return view('applications.view')->with('data', $leave)->with('status_changed_by', $st_by)
                ->with('used', $leave->user->used_leave)
                ->with('balance', $leave->user->balance_leave)
                ->with('unpaid', $unpaid_leaves)
                ->with('allowed', $leave->user->allowed_leave);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function apply()
    {
        $leavetypes = LeaveType::latest()->get();
        return view('leaves.apply')->with('leavetypes', $leavetypes);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(Request $request)
    {

        $request->validate([
            'leave_type_id' => 'required',
            'subject' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'no_of_days' => 'required'
        ]);
        $data = $request->input();
        $user_ = Auth::user();
        $unpaid = false;
        if ($user_->balance_leave > 0) {
            if ($data['no_of_days'] > $user_->balance_leave) {
                $notification = array(
                    'message' => 'You have ' . $user_->balance_leave . ' Leaves only',
                    'alert-type' => 'warning'
                );
                return redirect()->route('leave-apply')->with($notification);
            }
        } else {
            $unpaid = true;
        }
        date_default_timezone_set("Asia/Karachi");
        $date = date('d-m-Y h:i:s A');
        $date_new = date('d-m-Y');


        $dates = explode(' - ', $data['duration']);
        $islate = $this->isLate($dates[0], $data['no_of_days']);
        try {
            $app = new Application;
            $app->leave_type_id = $data['leave_type_id'];
            $app->subject = $data['subject'];
            $app->description = $data['description'];
            $app->start_from = $dates[0];
            $app->end_to = $dates[1];
            $app->no_of_days = $data['no_of_days'];
            $app->user_id = \Illuminate\Support\Facades\Auth::id();
            $app->team_lead = Auth::user()->team_lead;
            $app->late_apply = $islate;
            $app->datetime = $date;
            $app->unpaid = $unpaid;
            $app->half = isset($data['short_leave']) && $data['short_leave'] == true ? $data['half'] : 0;
            $app->short_leave = isset($data['short_leave']) && $data['short_leave'] == true ? true : false;

            if ($app->save()) {
                $mail_from = $_ENV['MAIL_FROM_ADDRESS'];
                $mail_from_name = $_ENV['MAIL_FROM_NAME'];
                Notification::send($app, new LeaveApplied($app, Auth::user()));
                $currentuser = \App\User::find(Auth::user()->id);
                $team_lead = \App\User::find(Auth::user()->team_lead);
                // Send Email to Team Lead from Employee
                $to_name = $team_lead->name;
                $to_email = $team_lead->email;
                $data = array('currentuser' => $currentuser, 'team_lead' => $team_lead, 'app_id' => $app->id);
                \Illuminate\Support\Facades\Mail::send('mail.apply-leave', $data, function ($message) use ($to_name, $to_email, $currentuser, $mail_from, $mail_from_name) {
                    $message->to($to_email, $to_name)
                        ->subject('Leave Apply');
                    $message->from($mail_from, $mail_from_name);
                });
            }

            $notification = array(
                'message' => 'Your Application has been submitted successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('leave-pending')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => 'Operation Failed. Please try again!',
                'alert-type' => 'danger'
            );
            return redirect()->route('leave-apply')->with($notification);
        }
    }

    function isLate($start_date, $days)
    {
        $st_date = strtotime($start_date);
        $datediff = ceil(($st_date - time()) / 60 / 60 / 24);
        $days = (float) $days;
        if ($days < 2) {
            if ($datediff < 1) {
                return true;
            }
        } elseif ($days > 1 && $days < 4) {
            if ($datediff < 7) {
                return true;
            }
        } elseif ($days > 3 && $days < 7) {
            if ($datediff < 14) {
                return true;
            }
        } elseif ($days > 6) {
            if ($datediff < 30) {
                return true;
            }
        }
        return false;
    }
}
