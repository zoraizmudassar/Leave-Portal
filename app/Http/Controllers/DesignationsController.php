<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designation;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DesignationsController extends Controller
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
        if (Auth::user()->hasPermission('view_designation')) {
            $des = Designation::latest()->get();
            return view('designations.all')->with('data', $des)->with('no', 1);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function add()
    {
        if (Auth::user()->hasPermission('add_designation')) {
            return view('designations.add');
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->hasPermission('update_designation')) {
            $des = Designation::find($id);
            return view('designations.edit')->with('data', $des);
        } else {
            return redirect()->route('access-denied');
        }
    }


    public function status($id, $status)
    {
        if (Auth::user()->hasPermission('update_designation')) {
            //Department::where('id',$id)->update(array('active_status'=>1));
            if ($status == 0) {
                Designation::where('id', $id)->update(array('active_status' => 1));
            } else {
                Designation::where('id', $id)->update(array('active_status' => 0));
            }
            return redirect()->route('des-all');
        } else {
            return redirect()->route('access-denied');
        }
    }


    /**
     * add designation.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function insert(Request $request)
    {
        $request->validate(
            [
                'type' => 'required | unique:designations',
                'description' => 'required',
            ],
            [
                'type.required' => "The designation name field is required",
            ]
        );

        $data = $request->input();
        try {
            $dep = new Designation;
            $dep->type = $data['type'];
            $dep->description = $data['description'];
            $dep->save();
            $notification = array(
                'message' => 'Designation Added Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('des-all')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => 'Operation Failed. Please try again!',
                'alert-type' => 'danger'
            );
            return redirect()->route('des-add')->with($notification);
        }
    }

    /**
     * update designation.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'type'   =>  [
                    'required',
                    Rule::unique('designations')->ignore($id),
                ],
                'description' => 'required',
            ],
            [
                'type.required' => "The designation name field is required",
            ]
        );
        $data = $request->input();
        try {
            $dep = Designation::find($id);
            $dep->type = $data['type'];
            $dep->description = $data['description'];
            $dep->save();
            $notification = array(
                'message' => 'Designation Updated Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('des-all')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => 'Operation Failed. Please try again!',
                'alert-type' => 'danger'
            );
            return redirect()->route('des-edit', ['id' => $id])->with($notification);
        }
    }

    /**
     * delete designation.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id)
    {
        if (Auth::user()->hasPermission('delete_designation')) {
            try {
                $dep = Designation::find($id);
                $dep->delete();
                return redirect()->route('des-all')->with('status', "deleted successfully");
            } catch (Exception $e) {
                return redirect()->route('des-all')->with('failed', "operation failed");
            }
        } else {
            return redirect()->route('access-denied');
        }
    }
}
