<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PermissionsGroup;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PermissionsGroupsController extends Controller {

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
        $des = PermissionsGroup::latest()->get();
        return view('permissionsgroups.all')->with('data', $des)->with('no', 1);
    }
    
    public function add()
    {
        return view('permissionsgroups.add');
    }
    
    public function edit($id)
    {
        $des = PermissionsGroup::find($id);
        return view('permissionsgroups.edit')->with('data', $des);
    }

    /**
     * add designation.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function insert(Request $request) {
        $rules = [
            'name' => 'required',
            'display_name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        $data = $request->input();
        try {
            $dep = new PermissionsGroup;
            $dep->name = $data['name'];
            $dep->display_name = $data['display_name'];
            $dep->save();
            return redirect()->route('per-group-all')->with('status', "Insert successfully");
        } catch (Exception $e) {
            return redirect()->route('per-group-add')->with('failed', "operation failed");
        }
    }
    
    /**
     * update designation.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id) {
        $rules = [
            'name' => 'required',
            'display_name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        $data = $request->input();
        try {
            $dep = PermissionsGroup::find($id);
            $dep->name = $data['name'];
            $dep->display_name = $data['display_name'];
            $dep->save();
            return redirect()->route('per-group-all')->with('status', "updated successfully");
        } catch (Exception $e) {
            return redirect()->route('per-group-edit', ['id'=>$id])->with('failed', "operation failed");
        }
    }
    
    /**
     * delete designation.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id) {
        try {
            $dep = PermissionsGroup::find($id);
            $dep->delete();
            return redirect()->route('per-group-all')->with('status', "deleted successfully");
        } catch (Exception $e) {
            return redirect()->route('per-group-all')->with('failed', "operation failed");
        }
    }

}