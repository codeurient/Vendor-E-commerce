<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function handleImage(Request $request) {

        $request->image->store('images', 'my_own_image_name.jpg');       

    }
}