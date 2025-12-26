<?php
namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {

        $sliders        = Slider::where('status', 1)->orderBy('serial', 'asc')->get(); 
        $flashSaleDate  = FlashSale::first();

        return view('frontend.home.home',
            compact(
                'sliders',
                'flashSaleDate',
            ));
    }
}