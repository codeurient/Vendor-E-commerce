<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __invoke(Request $request)
    {
        return DB::table('posts')->where('status',  1)->get();

        // return view('home', compact('blogs'));
    }
}
