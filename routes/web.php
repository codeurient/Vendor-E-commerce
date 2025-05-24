<?php
use Illuminate\Support\Facades\Route;
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