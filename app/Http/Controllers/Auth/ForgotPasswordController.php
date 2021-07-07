<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        if (Auth::user()->hasPermission('update_password')) {
            return view('auth.passwords.email');
        } else {
            return redirect()->route('access-denied');
        }
    }


    protected function sendResetLinkResponse(Request $request, $response)
    {
        // return back()->with('status', trans($response));
        return back()->with('status', trans('Password reset link has been sent to the provided email'));
    }
}
