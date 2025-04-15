<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function(){
    return view('welcome');
}); 


Route::get('/about', function(){
    return view('about.index');
})->name('about.page'); 



Route::get('/contact', function(){
    return view('contact', ['text' => 'Contact page']);
})->name('contact.page'); 



Route::fallback(function(){
    return "Route Not Exists";
});