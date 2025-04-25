<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {

        Post::withTrashed()->find(4)->forceDelete();


        // Post::withTrashed()->find(4)->restore();

    }
}