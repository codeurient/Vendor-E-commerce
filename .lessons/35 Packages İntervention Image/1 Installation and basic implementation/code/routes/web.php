<?php

use App\Models\User;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Format;


Route::get('/', function () {
    return view('welcome');
});



Route::get('user/{id}/edit', function ($id) {
    return $id;
})->name('user.edit');



Route::get('/dashboard', function (UsersDataTable $dataTable) {
    return $dataTable->render('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('image', function () {
    $manager = new ImageManager(new Driver());

    $image = $manager->read(public_path('car.jpg'))
                     ->cover(400, 400);

    $image->save(public_path('car2.jpg'), quality: 80);

    return response($image->toJpeg(quality: 65))->header('Content-Type', 'image/jpeg');
    // return response()->file(public_path('car2.jpg'));

});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
