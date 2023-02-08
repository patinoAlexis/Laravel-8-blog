<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store()
    {
        $attr = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username', 
            // 'username' => ['required','min:3','max:255', Rule:unique('users','username')]
            'email' => ['required','email','max:255', Rule::unique('users','email')],
            'password' => ['required','max:255','min:5']
        ]);

        // $attr['password'] = bcrypt($attr['password']);
        $usr = User::create($attr);
        //we logged in the user just created
        auth()->login($usr);
        // session()->flash('success', 'Your account has been created');
        return redirect('/')->with('success', 'Your account has been created');
    }
}
