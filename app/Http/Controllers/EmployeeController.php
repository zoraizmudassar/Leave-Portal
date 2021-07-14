<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\EmpCategory;
use App\Designation;
use App\Department;
use App\Permission;
use App\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        date_default_timezone_set("Asia/Karachi");
    }

    public function index()
    {
        if (Auth::user()->hasPermission('view_employee')) {
            return view('employee');
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function all()
    {
        if (Auth::user()->hasPermission('view_employee')) {
            if (!Auth::user()->hasRole('admin')) {
                if (Auth::user()->hasRole('team_lead')) {
                    $users = User::where('team_lead', Auth::user()->id)->latest()->get();
                } else {
                    $users = User::latest()->get();
                }
            } else {
                $users = User::latest()->get();
            }
            return view('employee.all')->with('data', $users)->with('no', 1);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function type($id)
    {
        if (Auth::user()->hasPermission('view_employee')) {
            $type = EmpCategory::where('id', $id)->first();
            if (!$type) {
                return redirect()->route("not-found");
            }
            if (!Auth::user()->hasRole('admin')) {
                if (Auth::user()->hasRole('team_lead')) {
                    $users = User::where('emp_category_id', $id)->where('team_lead', Auth::user()->id)->latest()->get();
                } else {
                    $users = User::where('emp_category_id', $id)->latest()->get();
                }
            } else {
                $users = User::where('emp_category_id', $id)->latest()->get();
            }
            return view('employee.type')->with('data', $users)->with('type', $type)->with('no', 1);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function status($id, $status)
    {
        if (Auth::user()->hasPermission('active_inactive_employee')) {
            $user_ = User::where('id', $id)->first();
            if($user_->hasRole('admin'))
            {
                return redirect()->route('access-denied');
            }
            //Department::where('id',$id)->update(array('active_status'=>1));
            if ($status == 0) {
                User::where('id', $id)->update(array('active_status' => 1));
            } else {
                User::where('id', $id)->update(array('active_status' => 0));
            }
            return redirect()->route('emp-all');
        } else {
            return redirect()->route('access-denied');
        }
    }

    //    public function interni($id) {
    //        $users = User::where('emp_category_id', $id)->get();
    //        return view('employee.interni')->with('data', $users)->with('no', 1);
    //    }
    //    public function probation($id) {
    //        $users = User::where('emp_category_id', $id)->get();
    //        return view('employee.probation')->with('data', $users)->with('no', 1);
    //    }
    //    public function permanent($id) {
    //        $users = User::where('emp_category_id')->get();
    //        return view('employee.permanent')->with('data', $users)->with('no', 1);
    //    }

    public function view($id)
    {
        if (Auth::user()->hasPermission('view_employee')) {
            $all_count = Application::where('user_id', $id)->sum('no_of_days');
            $pen_count = Application::where('user_id', $id)->where('status', 2)->sum('no_of_days');
            $acc_count = Application::where('user_id', $id)->where('status', 1)->sum('no_of_days');
            $rej_count = Application::where('user_id', $id)->where('status', 0)->sum('no_of_days');
            $user = User::find($id);
            if (!$user) {
                return redirect()->route("not-found");
            }
            $team_lead = user::where('id', $user->team_lead)->get()->first();
            $unpaid_leaves = Application::where('user_id', $user->id)->where('unpaid', true)->where('status', 1)->sum('no_of_days');
            return view('employee.view')
                ->with('user', $user)
                ->with('all_count', $all_count)
                ->with('pen_count', $pen_count)
                ->with('acc_count', $acc_count)
                ->with('team_lead', $team_lead)
                ->with('unpaid', $unpaid_leaves)
                ->with('rej_count', $rej_count);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function viewProfile($id)
    {
        $all_count = Application::where('user_id', $id)->sum('no_of_days');
        $pen_count = Application::where('user_id', $id)->where('status', 2)->sum('no_of_days');
        $acc_count = Application::where('user_id', $id)->where('status', 1)->sum('no_of_days');
        $rej_count = Application::where('user_id', $id)->where('status', 0)->sum('no_of_days');
        $user = User::find($id);
        if (!$user) {
            return redirect()->route("not-found");
        }
        $team_lead = user::where('id', $user->team_lead)->get()->first();
        $unpaid_leaves = Application::where('user_id', $user->id)->where('unpaid', true)->where('status', 1)->sum('no_of_days');
        return view('employee.profile')
            ->with('user', $user)
            ->with('all_count', $all_count)
            ->with('pen_count', $pen_count)
            ->with('acc_count', $acc_count)
            ->with('team_lead', $team_lead)
            ->with('unpaid', $unpaid_leaves)
            ->with('rej_count', $rej_count);
    }

    public function empRoles($id)
    {
        if (Auth::user()->hasPermission('assign_roles')) {
            $user = User::find($id);
            if (!$user) {
                return redirect()->route("not-found");
            }
            $roles = Role::get();
            $user_roles = isset($user->roles) ? $user->roles->toArray() : [];
            $roles_keys = [];
            foreach ($user_roles as $u_role) {
                $roles_keys[] = $u_role['id'];
            }
            return view('employee.roles')
                ->with('roles', $roles)
                ->with('user', $user)
                ->with('user_roles', $roles_keys);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function assignRoles(Request $request)
    {

        $data = $request->input();
        $user = User::find($data['emp_id']);
        if (isset($user->roles)) {
            $user->detachRoles($user->roles);
        }
        if (!empty($data['roles'])) {
            $user->attachRoles($data['roles']);
        }
        $users = User::all();
        $notification = array(
            'message' => 'Roles Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('emp-all')->with('data', $users)->with('no', 1)->with($notification);
    }

    public function editEmployee($id)
    {
        if (Auth::user()->hasPermission('update_employee')) {
            $user = User::where('id', $id)->first();
            if (!$user) {
                return redirect()->route("not-found");
            }
            $users = User::whereRoleIs('team_lead')->get();
            $ec = EmpCategory::select('id', 'name')->where('active_status', 1)->get()->all();
            $des = Designation::select('id', 'type')->where('active_status', 1)->get()->all();
            $dep = Department::select('id', 'name')->where('active_status', 1)->get()->all();
            return view('employee.edit')
                ->with('designations', $des)
                ->with('departments', $dep)
                ->with('users', $users)
                ->with('model', $user)
                ->with('empcategories', $ec);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function updateEmployee(Request $request, $id)
    {
        $request->validate(
            [
                'email'   =>  [
                    'required',
                    Rule::unique('users')->ignore($id),
                ],
                'name' => 'required',
                'designation_id' => 'required',
                'department_id' => 'required',
                'emp_category_id' => 'required',
                'team_lead' => 'required',
            ],
            [
                'designation_id.required' => 'The designation field is required',
                'department_id.required' => 'The department field is required',
                'emp_category_id.required' => 'The Employee category field is required'
            ]
        );
        $employee = User::where('id', $id)->first();
        $balance_ = $employee->balance_leave;
        $allowed_ = $employee->allowed_leave;
        $used_ = $employee->used_leave;

        $data = $request->input();
        if ($data['emp_category_id'] != $employee->emp_category_id) {
            if ($data['emp_category_id'] != 3) {
                $allowed_ = 0;
                $balance_ = 0;
                $used_ = 0;
            } else {
                $month = date('m');
                $day = date('d');
                $per_month = 20 / 12;
                $month = 12 - $month;
                if ($day <= 15) {
                    $month = $month + 1;
                }
                $allowed_ = $per_month * $month;
                $used_ = 0;
                $balance_ = $allowed_ - $used_;
            }
        }
        $user = User::where('id', $id)
            ->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'designation_id' => $data['designation_id'],
                'department_id' => $data['department_id'],
                'emp_category_id' => $data['emp_category_id'],
                'team_lead' => $data['team_lead'],
                'allowed_leave' => $allowed_,
                'used_leave' => $used_,
                'balance_leave' => $balance_
            ]);
        if (!$user) {
            $notification = array(
                'message' => 'Operation Failed. Please try again!',
                'alert-type' => 'danger'
            );
            return redirect()->route('emp-edit', ['id', $id])->with($notification);
        }
        $notification = array(
            'message' => 'Employee Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('emp-all')->with($notification);
    }

    public function quota()
    {
        if (Auth::user()->hasPermission('update_leave_quota')) {
            $y_now = date('Y');
            $date_1 = "31-12-";
            $exp_date = $date_1 . $y_now;
            $jan_ = "01-01-";
            $st_lqouta = $jan_ . $y_now;
            $update_ = User::where('emp_category_id', 3)->update(['allowed_leave' => '20', 'used_leave' => '0', 'balance_leave' => '20', 'start_lq' => $st_lqouta, 'lq_exp' => $exp_date]);
            if ($update_) {
                $notification = array(
                    'message' => 'Leave Quota has been generated for all Permanent Employee!',
                    'alert-type' => 'success'
                );
                return redirect()->route('emp-all')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Something Went Wrong! Please try Again',
                    'alert-type' => 'error'
                );
                return redirect()->route('emp-all')->with($notification);
            }
        } else {
            return redirect()->route('access-denied');
        }
    }
}
