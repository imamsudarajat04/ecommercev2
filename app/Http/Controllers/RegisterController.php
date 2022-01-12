<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'dateBirth' => 'required',
            'gender' => 'required',
            'password' => 'required|string|min:5',
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dateBirth = $request->dateBirth;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect('/login');
    }
}
