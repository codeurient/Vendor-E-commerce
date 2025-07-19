<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gateways\PaypalController;
use App\Http\Controllers\Gateways\TwoCheckoutController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('paypal/payment', [PaypalController::class, 'payment'])->name('paypal.payment');
Route::get('paypal/success',  [PaypalController::class, 'success'])->name('paypal.success');
Route::get('paypal/cancel',   [PaypalController::class,  'cancel'])->name('paypal.cancel');


Route::get('twocheckout/payment',         [TwoCheckoutController::class,  'showFrom'])->name('twocheckout.payment');

Route::post('twocheckout/handle-payment', [TwoCheckoutController::class,  'handlePayment'])->name('twocheckout.handle-payment');

Route::get('twocheckout/success', [TwoCheckoutController::class, 'success'])->name('twocheckout.success');