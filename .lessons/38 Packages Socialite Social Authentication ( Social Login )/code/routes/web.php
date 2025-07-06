<?php
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use App\Helpers\ImageFilter;
use App\DataTables\UsersDataTable;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Permission;
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
Route::get('remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('remove-product');
Route::get('remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('remove-product');


Route::get('create-role', function() {

    // $role = Role::create(['name' => 'publisher']);
    // return $permission;

    // $permission = Permission::create(['name' => 'edit articles']);
    // return $permission;

    // $user = auth()->user();
    // $user->assignRole('writer');
    // return $user;
    
    // $user = auth()->user();
    // $user->givePermissionTo('edit articles');
    // return $user;

    // $user = auth()->user();
    // return $user->getPermissionNames();

    // $user = auth()->user();
    // return $user->getRoleNames();

    // $user = auth()->user();
    // $checkPermission = $user->can('edit articles');
    // return $checkPermission;

    $user = auth()->user();
    if($user->can('edit articles')) {
        return 'user has permission';
    } else {
        return 'user has not permission';
    }
});


Route::get('posts', function() {
    $posts = Post::all();
    return view('post.post', compact('posts'));
});



Route::get('/auth/redirect', function () {

    return Socialite::driver('github')->redirect();

})->name('github.login');


 
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    
    $user = User::firstOrCreate([
        'email' => $user->email
    ], [
        'name' => $user->name,
        'password' => bcrypt(Str::random(24))
    ]);

    Auth::login($user, true);

    return redirect('/dashboard');

});