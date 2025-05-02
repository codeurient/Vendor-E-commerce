<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $category = Category::with('posts.category')->find(1);

        $posts = $category->posts;

        return view('home', compact('posts'));
    }
}