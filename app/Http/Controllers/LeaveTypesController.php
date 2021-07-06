<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaveType;
use App\User;
use App\Designation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class LeaveTypesController extends Controller {

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
        if (Auth::user()->hasPermission('view_leave_type')) {
            $des = LeaveType::latest()->get();
            return view('leavetypes.all')->with('data', $des)->with('no', 1);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function add() {
        if (Auth::user()->hasPermission('add_leave_type')) {
            return view('leavetypes.add');
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function edit($id) {
        if (Auth::user()->hasPermission('update_leave_type')) {
            $des = LeaveType::find($id);
            return view('leavetypes.edit')->with('data', $des);
        } else {
            return redirect()->route('access-denied');
        }
    }

    /**
     * add leave type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function insert(Request $request) {
         
        $request->validate([
            'name'=>'required',
            'description'=>'required'
            ]);

        $data = $request->input();
        try {
            $dep = new LeaveType;
            $dep->name = $data['name'];
            $dep->description = $data['description'];
            $dep->leaves_allow = 20;
            $dep->save();
            $notification = array(
                'message' => 'Leave type Added Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('lt-all')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => 'Operation Failed. Please try again!',
                'alert-type' => 'danger'
            );
            return redirect()->route('lt-add')->with($notification);
        }
    }

    public function status($id, $status) {
        if (Auth::user()->hasPermission('update_leave_type')) {
            //Department::where('id',$id)->update(array('active_status'=>1));
            if($status == 0)
            {
                LeaveType::where('id',$id)->update(array('active_status'=>1));
            }
            else
            {
                LeaveType::where('id',$id)->update(array('active_status'=>0));
            }
            return redirect()->route('lt-all');
        } else {
            return redirect()->route('access-denied');
        }
    }

    /**
     * update leave type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id) {
        $data = $request->input();
        try {
            $dep = LeaveType::find($id);
            $dep->name = $data['name'];
            $dep->description = $data['description'];
            $dep->leaves_allow = 20;
            $dep->save();
            $notification = array(
                'message' => 'Leave type Updated Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('lt-all')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => 'Operation Failed. Please try again!',
                'alert-type' => 'danger'
            );
            return redirect()->route('lt-edit', ['id' => $id])->with('failed', "operation failed");
        }
    }

    /**
     * delete leave type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id) {
        if (Auth::user()->hasPermission('delete_leave_type')) {
            try {
                $dep = LeaveType::find($id);
                $dep->delete();
                return redirect()->route('lt-all')->with('status', "deleted successfully");
            } catch (Exception $e) {
                return redirect()->route('lt-all')->with('failed', "operation failed");
            }
        } else {
            return redirect()->route('access-denied');
        }
    }

}
