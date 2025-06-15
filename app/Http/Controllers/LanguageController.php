<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch(Request $request)
    {
        
        $locale = $request->input('locale');

        if (in_array($locale, ['az', 'en'])) {

            session(['locale' => $locale]);

        }

        $previousUrl = url($locale . '/' . request()->segment(2));

        // segment(1) olsaydı onda belə bir nəticə olacaq:      "http://vendor-e-commerce.test/en/language-switch" bizə isə `en/language-switch` bu hissə yox `en` bu hissə lazımdır.

        // segment(2) onun üçün də segment() metodunda 2 yazmaq lazımdır. 

        // dd($previousUrl);
        
        return redirect($previousUrl);

    }
}
