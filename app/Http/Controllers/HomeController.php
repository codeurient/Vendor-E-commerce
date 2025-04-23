<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        DB::table('posts')->where('id', 17)->update([
            'title' => 'This is a UPDATED test Data 1',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum, ipsa.',
            'status' => 0,
            'publish_date' => date('Y-m-d'),
            'user_id' => 1
        ]);

        dd('success');
    }
}
