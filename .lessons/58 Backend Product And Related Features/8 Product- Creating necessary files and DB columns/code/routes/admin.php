<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Admin\Auth\AdminAuthenticatedSessionController;


Route::middleware('guest.admin')->group(function () {
    Route::get('login', [AdminAuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AdminAuthenticatedSessionController::class, 'store'])->name('login.submit');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard',                  [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('profile',                    [ProfileController::class, 'index'])->name('profile');
    Route::post('profile/update',            [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile/update/password',   [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::post('logout',                    [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Slider route
    Route::resource('slider', SliderController::class);

    // Category route
    Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
    Route::resource('category', CategoryController::class);

    // Sub Category route
    Route::put('subcategory/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
    Route::resource('sub-category', SubCategoryController::class);
    
    // Child Category route
    Route::put('child-category/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
    Route::get('get-subcategories', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');
    Route::resource('child-category', ChildCategoryController::class);

    // Brand Category route
    Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
    Route::resource('brand', BrandController::class);

    // Vendor Profile routes
    Route::resource('vendor-profile', AdminVendorProfileController::class);
    
});