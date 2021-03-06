<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\EmpCategory;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    public function empHome()
    {
        $user_id = Auth::user()->id;
        $date = new \Carbon\Carbon; //  DateTime string will be 2014-04-03 13:57:34

        $date->subDays(7); // or $date->subDays(7),  2014-03-27 13:58:25

        $latest_app = Application::where('user_id', $user_id)->where('created_at', '>', $date->toDateTimeString())->latest()->get();
        $all_app_count = Application::where('user_id', $user_id)->sum('no_of_days');
        $pen_app_count = Application::where('status', 2)->where('user_id', $user_id)->sum('no_of_days');
        $rej_app_count = Application::where('status', 0)->where('user_id', $user_id)->sum('no_of_days');
        $acc_app_count = Application::where('status', 1)->where('user_id', $user_id)->sum('no_of_days');
        $unpaid_leaves = Application::where('user_id', Auth::user()->id)->where('unpaid', true)->where('status', 1)->sum('no_of_days');
        return view('employee')
            ->with('all_count', $all_app_count)
            ->with('acc_count', $acc_app_count)
            ->with('rej_count', $rej_app_count)
            ->with('pen_count', $pen_app_count)
            ->with('unpaid', $unpaid_leaves)
            ->with('data', $latest_app);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole(['admin', 'team_lead']) == false)
            return redirect()->route('emp-home');
        // consider created_at is the field you want to query on the model called News
        $date = new \Carbon\Carbon; //  DateTime string will be 2014-04-03 13:57:34

        $date->subDays(7); // or $date->subDays(7),  2014-03-27 13:58:25

        if (Auth::user()->hasRole('team_lead') && !Auth::user()->hasRole('admin')) {
            $latest_app = Application::where('created_at', '>', $date->toDateTimeString())
                ->where('team_lead', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                // ->latest()
                ->get();
            $all_app_count = Application::where('team_lead', Auth::user()->id)->sum('no_of_days');
            $pen_app_count = Application::where('status', 2)
                ->where('team_lead', Auth::user()->id)
                ->sum('no_of_days');
            $rej_app_count = Application::where('status', 0)
                ->where('team_lead', Auth::user()->id)
                ->sum('no_of_days');
            $acc_app_count = Application::where('status', 1)
                ->where('team_lead', Auth::user()->id)
                ->sum('no_of_days');
        } else {
            $latest_app = Application::where('created_at', '>', $date->toDateTimeString())
            ->orderBy('created_at', 'desc')
            ->get();
            $all_app_count = Application::sum('no_of_days');
            $pen_app_count = Application::where('status', 2)->sum('no_of_days');
            $rej_app_count = Application::where('status', 0)->sum('no_of_days');
            $acc_app_count = Application::where('status', 1)->sum('no_of_days');
        }
        return view('home')
            ->with('all_count', $all_app_count)
            ->with('acc_count', $acc_app_count)
            ->with('rej_count', $rej_app_count)
            ->with('pen_count', $pen_app_count)
            ->with('data', $latest_app);
    }
}
