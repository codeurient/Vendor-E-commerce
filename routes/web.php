<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'customer'], function(){
    Route::get('/', function(){
        return "<h1>Customer</h1>";
    }); 

    Route::get('/create', function(){
        return "<h1>Customer create</h1>";
    }); 

    Route::get('/show', function(){
        return "<h1>Customer show</h1>";
    }); 
});