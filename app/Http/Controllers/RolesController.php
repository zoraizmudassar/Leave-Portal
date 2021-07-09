<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RolesController extends Controller
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
        if (Auth::user()->hasPermission('view_role')) {
            $deps = Role::all();
            return view('roles.all')->with('data', $deps)->with('no', 1);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function add()
    {
        if (Auth::user()->hasPermission('add_role')) {
            return view('roles.add');
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->hasPermission('update_role')) {
            $dep = Role::find($id);
            return view('roles.edit')->with('data', $dep);
        } else {
            return redirect()->route('access-denied');
        }
    }

    /**
     * add role.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function insert(Request $request)
    {
        //        $rules = [
        //            'name' => 'required',
        //            'description' => 'required',
        //        ];
        //        $validator = Validator::make($request->all(), $rules);

        $request->validate([
            'name' => 'required|unique:roles',
            'display_name' => 'required:unique.roles',
            'description' => 'required'
        ]);

        $data = $request->input();
        try {
            $dep = new Role;
            $dep->name = $data['name'];
            $dep->display_name = $data['display_name'];
            $dep->description = $data['description'];
            $dep->save();
            $notification = array(
                'message' => 'Role Added Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('role-all')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => 'Operation Failed. Please try again!',
                'alert-type' => 'danger'
            );
            return redirect()->route('role-add')->with($notification);
        }
    }

    /**
     * update role.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   =>  [
                'required',
                Rule::unique('roles')->ignore($id),
            ],
            'display_name'   =>  [
                'required',
                Rule::unique('roles')->ignore($id),
            ],
            'description' => 'required'
        ]);
        //        $rules = [
        //            'name' => 'required',
        //            'description' => 'required',
        //        ];
        //        $validator = Validator::make($request->all(), $rules);
        $data = $request->input();
        try {
            $dep = Role::find($id);
            $dep->name = $data['name'];
            $dep->display_name = $data['display_name'];
            $dep->description = $data['description'];
            $dep->save();
            $notification = array(
                'message' => 'Role Updated Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('role-all')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => 'Operation Failed. Please try again!',
                'alert-type' => 'danger'
            );
            return redirect()->route('role-edit', ['id' => $id])->with($notification);
        }
    }

    /**
     * update role.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id)
    {
        if (Auth::user()->hasPermission('delete_role')) {
            try {
                $dep = Role::find($id);
                $dep->delete();
                return redirect()->route('role-all')->with('status', "deleted successfully");
            } catch (Exception $e) {
                return redirect()->route('role-all')->with('failed', "operation failed");
            }
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function rolesPermissions($id)
    {
        if (Auth::user()->hasPermission('assign_permissions')) {
            $role = Role::find($id);
            $per_groups = \App\PermissionsGroup::get();
            $role_per = isset($role->permissions) ? $role->permissions->toArray() : [];
            $per_keys = [];
            foreach ($role_per as $r_per) {
                $per_keys[] = $r_per['id'];
            }
            return view('roles.permissions')
                ->with('permissions_groups', $per_groups)
                ->with('role', $role)
                ->with('role_permissions', $per_keys);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function status($id, $status)
    {
        if (Auth::user()->hasPermission('active_inactive_role')) {
            $role = Role::where('id', $id)->first();
            //Department::where('id',$id)->update(array('active_status'=>1));
            if ($status == 0) {
                Role::where('id', $id)->update(array('active_status' => 1));
            } else {
                Role::where('id', $id)->update(array('active_status' => 0));
                $users = User::whereRoleIs($role->name)->get();
                if ($users) {
                    foreach ($users as $user) {
                        $user->detachRole($role->name);
                    }
                }
            }
            return redirect()->route('role-all');
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function assignPermissions(Request $request)
    {
        $data = $request->input();
        $role = Role::find($data['role_id']);
        if (isset($role->permissions)) {
            $role->detachPermissions($role->permissions);
        }
        if (!empty($data['permissions'])) {
            $role->attachPermissions($data['permissions']);
        }
        $notification = array(
            'message' => 'Permissions Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('role-all')->with($notification);
    }
}
