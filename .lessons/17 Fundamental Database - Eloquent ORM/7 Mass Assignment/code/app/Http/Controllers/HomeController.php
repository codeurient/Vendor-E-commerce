<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {

        // $post = Post::create([
        //     'title' => 'this is from mass assign',
        //     'description' => 'this is a description from mass assign',
        //     'status' => 1,
        //     'publish_date' => date('Y-m-d'),
        //     'user_id' => 1,
        //     'category_id' => 2,
        //     'views' => 500,
        // ]);



        // $post = Post::find(3)->update([
        //     'title' => 'this is from UPDATED mass assign',
        // ]);


        $post = Post::where('status', 1)->update([
            'status' => 0,
        ]);

        dd('success');

    }
}