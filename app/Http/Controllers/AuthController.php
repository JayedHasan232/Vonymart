<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function verify()
    {
        return view('auth.verify');
    }

    public function verifyCheck(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/');
    }

    public function verificationNotification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
