<?php
use App\Models\User;
use App\Helpers\ImageFilter;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;


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


Route::get('shop', [CartController::class, 'shop'])->name('shop');

Route::get('cart', [CartController::class, 'cart'])->name('cart');


Route::get('add-to-cart/{product_id}', [CartController::class, 'addToCart'])->name('add-to-cart');

Route::get('qty-increment/{rowId}', [CartController::class, 'qtyIncrement'])->name('qty-increment');
Route::get('qty-decrement/{rowId}', [CartController::class, 'qtyDecrement'])->name('qty-decrement');