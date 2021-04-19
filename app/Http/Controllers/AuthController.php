<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
