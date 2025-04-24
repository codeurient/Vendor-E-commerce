<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        DB::table('categories')->insert([
            [
                'name' => 'News'
            ],
            [
                'name' => 'Tech'
            ],
            [
                'name' => 'Education'
            ],
        ]);
    }
}
