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
            'title' => 'This is a test Data',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum, ipsa.',
            'status' => 1,
            'publish_date' => date('Y-m-d'),
            'user_id' => 1
           ],
           [
            'title' => 'This is a test Data',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum, ipsa.',
            'status' => 1,
            'publish_date' => date('Y-m-d'),
            'user_id' => 1
           ],
        ]);

        dd('success');
    }
}
