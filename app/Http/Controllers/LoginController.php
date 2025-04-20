<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function handleLogin(Request $request) {

        $request->validate([
            'name' => ['required', 'alpha', 'min:6', 'max:10'],
            // 'name' => 'required|alpha',
            'email' => ['required', 'email'],
            'password' => 'required'
        ], [
            'name.required' => 'The user name field is required',
            'name.alpha' => 'User name should only contain letters',
            'email.email' => 'Hello this is not a email',
        ]);
        
        return $request;

    }
}
