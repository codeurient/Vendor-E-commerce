<?php

namespace App\Http\Controllers;

use App\Models\MyPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        // $post = MyPost::find(3);
        // return $post->title;


        // return MyPost::findOrFail(30);


        // $posts = MyPost::all();
        // foreach ($posts as $post) {
        //     echo $post->title . "<br>";
        // }


        // $posts = MyPost::where('status', 1)->get();
        // foreach ($posts as $post) {
        //     echo $post->title . "<br>";
        // }


        // return MyPost::where('description', 'this is a test description')->first();


        // return MyPost::where('description', 'this is a test description 2 ')->firstOrFail();

    }
}