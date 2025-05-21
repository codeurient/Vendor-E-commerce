<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/posts/trash', [PostController::class, 'trashed'])->name('posts.trashed');

Route::resource('posts', PostController::class);