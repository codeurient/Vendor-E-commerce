<?php
use App\Models\User;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Helpers\ImageFilter;


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


    return (new ImageFilter(public_path('car.jpg'),  public_path('car2.jpg'), 4))->applyPixelateGreyscale();

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
