<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function handleImage(Request $request) {

        $request->validate([
            // 'image' => 'required',
            // 'image' => ['required', 'min:100', 'max:500', 'mimes:png,jpg'],      // 100KB - 500KB
            'image' => ['required', 'min:100', 'max:1000', 'image'],                // only image
        ]);

        $request->image->storeAs('images', 'my_own_image_name.jpg');    
        
        // Storage::delete('/images/image_1.png');

        // File::delete(storage_path('/app/public/images/image_3.png'));

        // unlink(storage_path('/app/public/images/image_4.png'));

    }
}