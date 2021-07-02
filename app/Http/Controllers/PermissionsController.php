<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PermissionsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Karachi");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $deps = Permission::latest()->get();
        return view('permissions.all')->with('data', $deps)->with('no', 1);
    }
    
    public function add()
    {
        $pergroups = \App\PermissionsGroup::get();
        return view('permissions.add')->with('groups', $pergroups);
    }
    
    public function edit($id)
    {
        $pergroups = \App\PermissionsGroup::get();
        $dep = Permission::find($id);
        return view('permissions.edit')->with('data', $dep)->with('groups' , $pergroups);
    }

    /**
     * add permission.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function insert(Request $request) {
        $data = $request->input();
        try {
            $dep = new Permission;
            $dep->permissions_group_id = $data['permissions_group_id'];
            $dep->name = $data['name'];
            $dep->display_name = $data['display_name'];
            $dep->description = $data['description'];
            $dep->save();
            return redirect()->route('per-all')->with('status', "Insert successfully");
        } catch (Exception $e) {
            return redirect()->route('per-add')->with('failed', "operation failed");
        }
    }
    
    /**
     * update permission.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id) {
        $data = $request->input();
        try {
            $dep = Permission::find($id);
            $dep->permissions_group_id = $data['permissions_group_id'];
            $dep->name = $data['name'];
            $dep->display_name = $data['display_name'];
            $dep->description = $data['description'];
            $dep->save();
            return redirect()->route('per-all')->with('status', "updated successfully");
        } catch (Exception $e) {
            return redirect()->route('per-edit', ['id'=>$id])->with('failed', "operation failed");
        }
    }
    
    /**
     * update permission.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id) {
        try {
            $dep = Permission::find($id);
            $dep->delete();
            return redirect()->route('per-all')->with('status', "deleted successfully");
        } catch (Exception $e) {
            return redirect()->route('per-all')->with('failed', "operation failed");
        }
    }

}