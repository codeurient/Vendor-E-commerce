<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;


Route::get('/',         HomeController::class)->name('home'); 



Route::get('/about',    [AboutController::class, 'index'])->name('about'); 

Route::resource('blog', BlogController::class);