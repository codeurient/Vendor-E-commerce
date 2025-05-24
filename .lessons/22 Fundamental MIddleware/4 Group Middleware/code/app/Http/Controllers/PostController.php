<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('category')->paginate(4);
        return view('index', compact('posts'));
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

    public function show(string $id){
        $post = Post::findOrFail($id);
        return view('show', compact('post'));
    }                          

    public function edit(string $id){
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('edit', compact('post', 'categories'));
    }                          

    public function update(Request $request, string $id){
        $request->validate([
            'title'         => ['required', 'max:255'],
            'category_id'   => ['required', 'integer'],
            'description'   => ['required'],
        ]);

        $post = Post::findOrFail($id);

        if($request->hasFile('image')) {
            $request->validate([
                'image'         => ['required', 'max:2028', 'image'],
            ]);
            
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('uploads', $fileName);

            File::delete(public_path($post->image));

            $post->image        = 'storage/'.$filePath;
        }

        $post->title        = $request->title;
        $post->description  = $request->description;
        $post->category_id  = $request->category_id;
        $post->save();

        return redirect()->route('posts.index');
    }     

    public function destroy(string $id){

        $post = Post::findOrFail($id);
        
        $post->delete();

        return redirect()->route('posts.index');
        
    }        
    
    public function trashed() {

        $posts = Post::onlyTrashed()->get();
        return view('trashed', compact('posts'));
    }

    public function restore($id) {

        $post = Post::onlyTrashed()->findOrFail($id);

        $post->restore();

        return redirect()->back();
    }

    public function forceDelete($id) {

        $post = Post::onlyTrashed()->findOrFail($id);

        File::delete(public_path($post->image));
        $post->forceDelete();

        return redirect()->back();
    }
}