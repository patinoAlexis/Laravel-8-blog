<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success', 'You have been log out');
    }
    public function create(){
        // ddd('d');
        return view('sessions.create');
    }
    public function store(){
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(auth()->attempt($credentials)){
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome Back!');
        }

        throw ValidationException::withMessages(['email' => "Your provided credentials couldn't be verified"]);
        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => "Your provided credentials couldn't be verified"]);
    }
}
