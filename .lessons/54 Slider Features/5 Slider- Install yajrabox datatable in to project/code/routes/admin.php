<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;

use App\Http\Controllers\Admin\Auth\AdminAuthenticatedSessionController;

Route::middleware('guest.admin')->group(function () {
    Route::get('login', [AdminAuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AdminAuthenticatedSessionController::class, 'store'])->name('login.submit');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard',  [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('profile',                    [ProfileController::class, 'index'])->name('profile');
    Route::post('profile/update',            [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile/update/password',   [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::post('logout',    [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Slider route
    Route::resource('slider', SliderController::class);
});