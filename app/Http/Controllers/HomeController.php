<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $posts = Post::with('tags')->paginate(10);

        if ($request->ajax()) {
            return view('partials.posts', compact('posts'))->render();
        }
        
        return view('home', compact('posts'));
    }
}