<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EmpCategoriesController extends Controller {

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
        if (Auth::user()->hasPermission('view_employee_category')) {
            $des = EmpCategory::latest()->get();
            return view('empcategories.all')->with('data', $des)->with('no', 1);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function add() {
        if (Auth::user()->hasPermission('add_employee_category')) {
            return view('empcategories.add');
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function edit($id) {
        if (Auth::user()->hasPermission('update_category')) {
            $des = EmpCategory::find($id);
            return view('empcategories.edit')->with('data', $des);
        } else {
            return redirect()->route('access-denied');
        }
    }

    public function insert(Request $request) {

        $request->validate([
            'name'=>'required|unique:emp_categories',
            'description'=>'required'
        ]);

        $data = $request->input();
        try {
            $dep = new EmpCategory;
            $dep->name = $data['name'];
            $dep->description = $data['description'];
            $dep->save();
            return redirect()->route('ec-all')->with('status', "Insert successfully");
        } catch (Exception $e) {
            return redirect()->route('ec-add')->with('failed', "operation failed");
        }
    }

    public function status($id, $status) {
        if (Auth::user()->hasPermission('active_inactive_employee_category')) {
            //Department::where('id',$id)->update(array('active_status'=>1));
            if($status == 0)
            {
                EmpCategory::where('id',$id)->update(array('active_status'=>1));
            }
            else
            {
                EmpCategory::where('id',$id)->update(array('active_status'=>0));
            }
            return redirect()->route('ec-all');
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
        $request->validate([
            'name'   =>  [
                'required',
                 Rule::unique('emp_categories')->ignore($id),
            ],
            'description'=>'required',
        ]);
        $data = $request->input();
        try {
            $dep = EmpCategory::find($id);
            $dep->name = $data['name'];
            $dep->description = $data['description'];
            $dep->save();
            return redirect()->route('ec-all')->with('status', "updated successfully");
        } catch (Exception $e) {
            return redirect()->route('ec-edit', ['id' => $id])->with('failed', "operation failed");
        }
    }

    /**
     * delete leave type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id) {
        if (Auth::user()->hasPermission('delete_employee_category')) {
            try {
                $dep = EmpCategory::find($id);
                $dep->delete();
                return redirect()->route('ec-all')->with('status', "deleted successfully");
            } catch (Exception $e) {
                return redirect()->route('ec-all')->with('failed', "operation failed");
            }
        } else {
            return redirect()->route('access-denied');
        }
    }

}
