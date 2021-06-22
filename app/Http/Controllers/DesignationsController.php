<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designation;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DesignationsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        if (Auth::user()->hasPermission('view_designation')) {
            $des = Designation::latest()->get();
            return view('designations.all')->with('data', $des)->with('no', 1);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function add() {
        if (Auth::user()->hasPermission('add_designation')) {
            return view('designations.add');
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function edit($id) {
        if (Auth::user()->hasPermission('update_designation')) {
            $des = Designation::find($id);
            return view('designations.edit')->with('data', $des);
        } else {
            return redirect()->route('access-denied');
        }
    }

    /**
     * add designation.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function insert(Request $request) {
        $request->validate([
            'type'=>'required',
            'description'=>'required',
        ]);
      
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
    public function update(Request $request, $id) {
        $rules = [
            'type' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
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
    public function delete($id) {
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
