<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {

        return Post::all();

        // Post::where('id', 4)->delete();
        // dd('success');

    }
}