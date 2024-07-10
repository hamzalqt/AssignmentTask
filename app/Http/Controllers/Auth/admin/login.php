<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ], [
            'email.exists' => 'The provided email is not registered.',
            'email.required' => 'Please enter your email address.',
            'password.required' => 'Please enter your password.',
        ]);


        if(Auth::attempt($credentials)){
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended('/manage/users');
            }else{
                return redirect()->intended('/401');
            }
    }

        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ]);
    }





}
