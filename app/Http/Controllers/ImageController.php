<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function handleImage(Request $request) {

        $request->validate([
            'image' => ['required', 'min:100', 'max:1000', 'image'],               
        ]);

        $request->image->storeAs('images', 'my_own_image_name.jpg');    
        
    }


    public function download() {
        
        return response()->download(public_path('/storage/images/my_own_image_name.jpg'));
        
    }
}