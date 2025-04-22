<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __invoke(Request $request)
    {
        $blogs = [
            [
                'title' => 'Afterward, once I became famous',
                'body' => 'I once did an interview for the Banbury Herald. I must look it out one of these days, for the biography. Strange chap they sent me. A boy, really.',
                'status' => 1
            ],
            [
                'title' => 'And I told. Simple little',
                'body' => ' The collar, the cut, the fabric, all wrong. It was the kind of thing a mother might buy for a boy leaving school for his first job, imagining that her child will somehow grow into it.',
                'status' => 1
            ],
            [
                'title' => 'They went away happy',
                'body' => 'Apart from the fact that they make dull companions. Just so long as they don"t start on about storytelling and honesty, the way some of them do. Naturally that annoys me.',
                'status' => 0
            ],
            [
                'title' => 'Anyway, the boy from the',
                'body' => 'They would do research, come along with a little piece of truth concealed in their pocket, draw it out at an opportune moment and hope to startle me into revealing more.',
                'status' => 1
            ],
        ];

        return view('home', compact('blogs'));
    }
}
