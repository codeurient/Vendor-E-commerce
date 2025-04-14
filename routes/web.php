<?php

use Illuminate\Support\Facades\Route;

Route::get('about', function () {
    return "<h1>About Page</h1>";
})->name('example');

Route::get('contact', function () {
    return "<h1>Contact Page</h1>";
});

Route::get('contact/{id}', function ($id) {
    return $id;
})->name('edit-contact');




Route::get('/user/{id}/{slug}', function ($id, $slug) {
    return $id . ' ' . $slug;
})->name('user.post');


Route::get('home', function () {
    return 
        "
            <a href='".route('example')."'>About Page</a>
            <a href='".route('edit-contact', 12)."'>Dynamic Page</a>
            <a href='".route('user.post', ['id' => 1, 'slug' => 'hello'])."'>More parameters</a>
        ";
});