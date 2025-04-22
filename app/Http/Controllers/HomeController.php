<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __invoke(Request $request)
    {
        return DB::table('posts')->where('id', 1)->value('title');

        // return view('home', compact('blogs'));
    }
}
