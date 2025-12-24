<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function index() 
    {
        return view('frontend.dashboard.dashboard');

    }



}
