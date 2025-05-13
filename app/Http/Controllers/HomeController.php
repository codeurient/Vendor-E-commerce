<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;


class HomeController extends Controller
{
    public function __invoke(Request $request)
    {

        return view('home');

    }   
}