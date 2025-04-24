<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $post = Post::where('id', '2')->get();
        $post->title = 'post 5 updated';
        $post->save();
        dd('success');



        // $post = Post::find(2);
        // $post->title = 'post 2 updated';
        // $post->save();
        // dd('success');

    }
}