<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function index() {
        $posts = Cache::remember('posts-page-'.request('page', 1),      60*60, function(){

            return Post::with('category')->paginate(4);

        });
        return view('index', compact('posts'));
    }

    public function create(){

        $this->authorize('create', Post::class);

        $categories = Category::all();
        return view('create', compact('categories'));
    }                                  

    public function store(Request $request){

        $this->authorize('create', Post::class);

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
        $this->authorize('update', $post);

        $categories = Category::all();
        return view('edit', compact('post', 'categories'));
    }                          

    public function update(Request $request, string $id){
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);

        $request->validate([
            'title'         => ['required', 'max:255'],
            'category_id'   => ['required', 'integer'],
            'description'   => ['required'],
        ]);

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

        $this->authorize('delete', $post);

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