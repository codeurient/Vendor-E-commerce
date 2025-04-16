<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    $blogs = [
        [
            'title' => 'Afterward, once I became famous',
            'body' => 'I once did an interview for the Banbury Herald. I must look it out one of these days, for the biography. Strange chap they sent me. A boy, really.',
        ],
        [
            'title' => 'And I told. Simple little',
            'body' => ' The collar, the cut, the fabric, all wrong. It was the kind of thing a mother might buy for a boy leaving school for his first job, imagining that her child will somehow grow into it.',
        ],
        [
            'title' => 'They went away happy',
            'body' => 'Apart from the fact that they make dull companions. Just so long as they don"t start on about storytelling and honesty, the way some of them do. Naturally that annoys me.',
        ],
        [
            'title' => 'Anyway, the boy from the',
            'body' => 'They would do research, come along with a little piece of truth concealed in their pocket, draw it out at an opportune moment and hope to startle me into revealing more.',
        ],
    ];
    return view('home', compact('blogs'));
})->name('home'); 


Route::get('/about', function(){
    return view('about');
})->name('about'); 

