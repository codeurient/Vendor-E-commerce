<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('index');
    }                                  

    public function create(){
        $categories = Category::all();
        return view('create', compact('categories'));
    }                                  

    public function store(Request $request){
        $request->validate([
            'image'         => ['required', 'max:2028', 'image'],
            'title'         => ['required', 'max:255'],
            'category_id'   => ['required', 'integer'],
            'description'   => ['required'],
        ]);

        $fileName = time().'_'.$request->image->getClientOriginalName();
        $filePath = $request->image->storeAs('uploads', $fileName);

        $post = new Post();
        $post->title        = $request->title;
        $post->description  = $request->description;
        $post->category_id  = $request->category_id;
        $post->image        = 'storage/'.$filePath;
        $post->save();

        return redirect()->route('posts.index');
    }                   

    public function show(string $id){}                          

    public function edit(string $id){}                          

    public function update(Request $request, string $id){}     

    public function destroy(string $id){}                       
}