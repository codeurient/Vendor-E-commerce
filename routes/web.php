<?php

use Illuminate\Support\Facades\Route;



Route::get('/about', function(){
    return "<h1>Customer create</h1>";
}); 

Route::get('/contact', function(){
    return "<h1>Customer show</h1>";
}); 


Route::fallback(function(){
    return "Route Not Exists";
});