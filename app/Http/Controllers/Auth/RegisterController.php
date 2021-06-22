<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\EmpCategory;
use App\Designation;
use App\Department;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => ['required', 'string'],
                    'email' => ['required', 'email', 'unique:users'],
                    'password' => ['required', 'min:8', 'confirmed'],
                    'department_id' => ['required'],
                    'designation_id' => ['required'],
                    'emp_category_id' => ['required'],
                    'team_lead' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        date_default_timezone_set("Asia/Karachi");
        $date = date('d-m-Y');

        $futureDate = date('d-m-Y', strtotime('+1 years'));
        //echo $futureDate;

        $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    //'password' => Crypt::encryptString($data['password']),
                    'designation_id' => $data['designation_id'],
                    'department_id' => $data['department_id'],
                    'emp_category_id' => $data['emp_category_id'],
                    'team_lead' => $data['team_lead'],
                    'role' => 2,
                    'lq_exp' => $futureDate,
                    'start_lq' => $date                    
        ]);
        if ($user) {
            $user->attachRole('employee');
        }
        return $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm() {
//        $role_team_lead = \App\Role::where('name', 'team_lead')->get();
        $users = User::whereRoleIs('team_lead')->get();
        $ec = EmpCategory::select('id', 'name')->get()->all();
        $des = Designation::select('id', 'type')->get()->all();
        $dep = Department::select('id', 'name')->where('active_status', 1)->get()->all();
        return view('auth.register')
                        ->with('designations', $des)
                        ->with('departments', $dep)
                        ->with('users', $users)
                        ->with('empcategories', $ec);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(\Illuminate\Http\Request $request) {
        $this->validator($request->all())->validate();

        event(new \Illuminate\Auth\Events\Registered($user = $this->create($request->all())));

//        $this->guard()->login($user);

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

}
