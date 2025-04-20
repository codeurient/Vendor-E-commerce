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
        ]);
        
        return $request;

    }
}
