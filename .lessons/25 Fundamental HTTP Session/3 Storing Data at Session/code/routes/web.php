<?php
use App\Models\Post;

use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;

Route::group(['middleware' => 'authCheck2'], function() {

    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', function() {
        return view('profile');
    })->name('profile');

});

Route::get('/unavailable', function() {
    return view('unavailable');
})->name('unavailable');

Route::get('/welcome', function() {
    return view('welcome');
})->name('welcome');

Route::get('/posts/trash',                  [PostController::class, 'trashed'])->name('posts.trashed');
Route::get('/posts/{id}/restore',           [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/posts/{id}/force-delete',   [PostController::class, 'forceDelete'])->name('posts.force_delete');

Route::resource('posts', PostController::class);

Route::get('contact', function() {
    $posts = Post::all();
    return view('contact', compact('posts'));
});

Route::get('send-mail', function() {
    // Mail::raw('This is a test mail', function($message) {
    //     $message->to('test@example.com')->subject('Hello');
    // });

    Mail::send(new OrderShipped);

    return 'Email sent';
});

Route::get('get-session', function(Request $request) {
    // $data = session()->all();
    $data = $request->session()->all();
    // $data = $request->session()->get('_token');
    dd($data);
});

Route::get('save-session', function(Request $request) {

    // $request->session()->put('user_id', 35);

    // $request->session()->put([
    //     'user_status' => 'logged_in',
    //     'user_role' => 'moderator'
    // ]);

    session(['user_ip' => '123.23.11']);

    return redirect('get-session');

});

