<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    //show register/create form
    public function create() {
        return view('users.register');
    }

    //store new user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        return redirect('/')->with('message', "User created and logged in");
    }

    //logout user
    public function logout(Request $request) {
        //remove the authentication information from the user's session
        auth()->logout();

        //invalidate the user's session
        $request->session()->invalidate();

        //regenerate the user's csrf token
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
}
