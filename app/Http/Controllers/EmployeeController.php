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

class EmployeeController extends Controller {

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
        date_default_timezone_set("Asia/Karachi");
    }

    public function index() {
        if (Auth::user()->hasPermission('view_employee')) {
            return view('employee');
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function all() {
        if (Auth::user()->hasPermission('view_employee')) {
            $users = User::latest()->get();
            return view('employee.all')->with('data', $users)->with('no', 1);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function interni() {
        if (Auth::user()->hasPermission('view_employee')) {
            $users = User::where('emp_category_id', 1)->latest()->get();
            return view('employee.interni')->with('data', $users)->with('no', 1);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function probation() {
        if (Auth::user()->hasPermission('view_employee')) {
            $users = User::where('emp_category_id', 2)->latest()->get();
            return view('employee.probation')->with('data', $users)->with('no', 1);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function permanent() {
        if (Auth::user()->hasPermission('view_employee')) {
            $users = User::where('emp_category_id', 3)->latest()->get();
            return view('employee.permanent')->with('data', $users)->with('no', 1);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function status($id, $status) {
        if (Auth::user()->hasPermission('update_designation')) {
            //Department::where('id',$id)->update(array('active_status'=>1));
            if($status == 0)
            {
                User::where('id',$id)->update(array('active_status'=>1));
            }
            else
            {
                User::where('id',$id)->update(array('active_status'=>0));
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

    public function view($id) {
        if (Auth::user()->hasPermission('view_employee')) {
            $all_count = Application::where('user_id', $id)->count();
            $pen_count = Application::where('user_id', $id)->where('status', 2)->count();
            $acc_count = Application::where('user_id', $id)->where('status', 1)->count();
            $rej_count = Application::where('user_id', $id)->where('status', 0)->count();
            $user = User::find($id);
            $team_lead = user::where('id', $user->team_lead)->get()->first();
            return view('employee.view')
                            ->with('user', $user)
                            ->with('all_count', $all_count)
                            ->with('pen_count', $pen_count)
                            ->with('acc_count', $acc_count)
                            ->with('team_lead', $team_lead)
                            ->with('rej_count', $rej_count);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function viewProfile($id) {
        $all_count = Application::where('user_id', $id)->count();
        $pen_count = Application::where('user_id', $id)->where('status', 2)->count();
        $acc_count = Application::where('user_id', $id)->where('status', 1)->count();
        $rej_count = Application::where('user_id', $id)->where('status', 0)->count();
        $user = User::find($id);
        $team_lead = user::where('id', $user->team_lead)->get()->first();
        return view('employee.profile')
                        ->with('user', $user)
                        ->with('all_count', $all_count)
                        ->with('pen_count', $pen_count)
                        ->with('acc_count', $acc_count)
                        ->with('team_lead', $team_lead)
                        ->with('rej_count', $rej_count);
    }

    public function empRoles($id) {
        if (Auth::user()->hasPermission('assign_roles')) {
            $user = User::find($id);
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

    public function assignRoles(Request $request) {

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

    public function editEmployee($id) {
        if (Auth::user()->hasPermission('update_employee')) {
            $user = User:: where('id', $id)->first();
            $users = User::whereRoleIs('team_lead')->get();
            $ec = EmpCategory ::select('id', 'name')->get()->all();
            $des = Designation ::select('id', 'type')->get()->all();
            $dep = Department::select('id', 'name')->get()->all();
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

    public function updateEmployee(Request $request, $id) {
        $employee = User::where('id', $id)->get();
        $data = $request->input();

        $user = User::where('id', $id)
                ->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'designation_id' => $data['designation_id'],
            'department_id' => $data['department_id'],
            'emp_category_id' => $data['emp_category_id'],
            'team_lead' => $data['team_lead'],
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

}
