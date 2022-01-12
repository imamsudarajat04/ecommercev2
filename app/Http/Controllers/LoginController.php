<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password')))
        {
            return redirect('/dashboard');
        }
        return redirect('/login')->with('error', 'Your username and password are invalid!');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
