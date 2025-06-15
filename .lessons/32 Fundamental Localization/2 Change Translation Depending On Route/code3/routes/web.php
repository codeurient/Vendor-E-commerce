<?php
use App\Models\Post;
use App\Jobs\SendMail;
use App\Mail\PostPublished;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/unavailable', function() {
    return view('unavailable');
})->name('unavailable');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts/trash',                  [PostController::class, 'trashed'])->name('posts.trashed');
    Route::get('/posts/{id}/restore',           [PostController::class, 'restore'])->name('posts.restore');
    Route::delete('/posts/{id}/force-delete',   [PostController::class, 'forceDelete'])->name('posts.force_delete');
    Route::resource('posts', PostController::class);
});

// Route::get('/user-data', function() {
//     return Auth::user();
//     // return auth()->user();
//     // return Auth::user()->name;
//     // return auth()->user()->email;
// });

Route::get('/send-mail', function() {

    SendMail::dispatch();
    
    dd('Mail has been sended');
});

Route::get('/user-register', function() {
    
    $email = 'user@gmail.com';

    event(new UserRegistered($email));

    dd('Message sent');
});


Route::get('/greeting/{locale}', function($locale) {

    App::setLocale($locale);
    
    return view('greeting');

})->name('greeting');



// Route::get('{locale}/', function () {
//     return view('welcome');
// });

// Route::get('{locale}/about', function () {
//     return view('about');
// });


Route::get('/', function () {
    $locale = session('locale', config('app.fallback_locale'));
    return redirect($locale);
});


Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'az|en']], function () {

    Route::get('/', fn() => view('welcome'));

    Route::get('/about', fn() => view('about'));

});



Route::post('/language-switch', [LanguageController::class, 'switch'])->name('language.switch');
