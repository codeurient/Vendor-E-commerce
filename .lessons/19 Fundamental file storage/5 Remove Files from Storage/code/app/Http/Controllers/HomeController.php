<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;


class HomeController extends Controller
{
    public function __invoke(Request $request)
    {

        // Storage::delete('/images/image_1.png');

        // File::delete(storage_path('/app/public/images/image_3.png'));

        unlink(storage_path('/app/public/images/image_4.png'));

    }   
}