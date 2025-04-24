<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {

        $post = new Post();

        $post->title        = 'post 4';
        $post->description  = 'this is a test description 4';
        $post->status       = 1;
        $post->publish_date = date('Y-m-d');
        $post->user_id      = 1;
        $post->category_id  = 1;
        $post->views        = 400;

        $post->save();

        dd('success');

    }
}