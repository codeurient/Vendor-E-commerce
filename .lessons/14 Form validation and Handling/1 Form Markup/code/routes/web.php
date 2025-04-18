<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/',         HomeController::class)->name('home'); 


Route::get('/login',    [LoginController::class, 'index'])->name('login'); 
Route::get('/about',    [AboutController::class, 'index'])->name('about'); 



