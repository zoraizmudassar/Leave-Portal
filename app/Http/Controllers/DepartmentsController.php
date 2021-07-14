<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DepartmentsController extends Controller {

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
        if (Auth::user()->hasPermission('view_department')) {
            $deps = Department::latest()->get();
            return view('departments.all')->with('data', $deps)->with('no', 1);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function add() {
        if (Auth::user()->hasPermission('add_department')) {
            return view('departments.add');
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function edit($id) {
        if (Auth::user()->hasPermission('update_department')) {
            $dep = Department::find($id);
            if (!$dep) {
                return redirect()->route("not-found");
            }
            return view('departments.edit')->with('data', $dep);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function status($id, $status) {
        if (Auth::user()->hasPermission('active_inactive_department')) {
            //Department::where('id',$id)->update(array('active_status'=>1));
            if($status == 0)
            {
                Department::where('id',$id)->update(array('active_status'=>1));
            }
            else
            {
                Department::where('id',$id)->update(array('active_status'=>0));
            }
            return redirect()->route('dep-all');
        } else {
            return redirect()->route('access-denied');
        }
    }

    /**
     * add department.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function insert(Request $request) {
        
        if (Auth::user()->hasPermission('add_department')) {
            $request->validate([
                'name'=>'required | unique:departments',
                'description'=>'required'
                ]);
            $data = $request->input();
            try {
                $dep = new Department;
                $dep->name = $data['name'];
                $dep->description = $data['description'];
                $dep->save();
                $notification = array(
                    'message' => 'Department Added Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->route('dep-all')->with($notification);
            } catch (Exception $e) {
                $notification = array(
                    'message' => 'Operation Failed. Please try again!',
                    'alert-type' => 'danger'
                );
                return redirect()->route('dep-add')->with($notification);
            }
        } else {
            return redirect()->route('access-denied');
        }
    }

    /**
     * update department.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id) {
        if (Auth::user()->hasPermission('update_department')) {
            $request->validate([
                // 'name'=>'required | unique:departments',
                'name'   =>  [
                    'required',
                     Rule::unique('departments')->ignore($id),
                ],
                'description'=>'required',
            ]);
            $data = $request->input();
            try {
                $dep = Department::find($id);
                $dep->name = $data['name'];
                $dep->description = $data['description'];
                $dep->save();
                $notification = array(
                    'message' => 'Department Updated Successfully!',
                    'alert-type' => 'success'
                );
                return redirect()->route('dep-all')->with($notification);
            } catch (Exception $e) {
                $notification = array(
                    'message' => 'Operation Failed. Please try again!',
                    'alert-type' => 'danger'
                );
                return redirect()->route('dep-edit', ['id' => $id])->with($notification);
            }
        } else {
            return redirect()->route('access-denied');
        }
    }

    /**
     * update department.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id) {
        if (Auth::user()->hasPermission('delete_department')) {
            try {
                $dep = Department::find($id);
                $dep->delete();
                return redirect()->route('dep-all')->with('status', "deleted successfully");
            } catch (Exception $e) {
                return redirect()->route('dep-all')->with('failed', "operation failed");
            }
        } else {
            return redirect()->route('access-denied');
        }
    }

}
