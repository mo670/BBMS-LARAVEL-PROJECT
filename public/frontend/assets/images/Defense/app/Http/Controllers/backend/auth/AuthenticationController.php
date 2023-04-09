<?php

namespace App\Http\Controllers\backend\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    public function loginpage()
    {
        return view('backend.partials.auth.loginpage');
    }

    public function submitLogin(Request $request)
    {
    //    return  $request->all();
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // dd('ok');
            return redirect()->route('dashboard')->with('message','login successfull');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }   
    public function logout()
    {
        
        Auth::logout();
        return redirect()->route('login.page');

    }
}
