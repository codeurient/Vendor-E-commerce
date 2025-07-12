<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gateways\PaypalController;

Route::get('/', function () {
    return view('welcome');
});



Route::post('paypal/payment', [PaypalController::class, 'payment'])->name('paypal.payment');
Route::get('paypal/success',  [PaypalController::class, 'success'])->name('paypal.success');
Route::get('paypal/cancel',   [PaypalController::class,  'cancel'])->name('paypal.cancel');