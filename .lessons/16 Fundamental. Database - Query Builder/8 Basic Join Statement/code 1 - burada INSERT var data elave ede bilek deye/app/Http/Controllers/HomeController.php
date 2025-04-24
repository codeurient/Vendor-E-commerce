<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        DB::table('posts')->insert([
            [
                'title' => 'post 1',
                'description' => 'this is a test description',
                'status' => 1,
                'user_id' => 1,
                'category_id' => 1,
            ],
            [
                'title' => 'post 2',
                'description' => 'this is a test description',
                'status' => 1,
                'user_id' => 1,
                'category_id' => 2,
            ],
            [
                'title' => 'post 3',
                'description' => 'this is a test description',
                'status' => 1,
                'user_id' => 1,
                'category_id' => 3,
            ],
        ]);

        dd('success');
    }
}