<?php
use App\Http\Controllers\CarController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MathController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('Home');

Route::view('/about', 'about')->name('about');

Route::get('/car/search', [CarController::class, 'search'])->name('car.search');

Route::middleware('auth')->group(function () {
    Route::get('/car/watchlist', [CarController::class, 'watchlist'])->name('car.watchlist');
    Route::resource('car', CarController::class)->except(['show']);
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});

Route::resource('car', CarController::class)->only(['show']);

Route::middleware('guest')->group(function () {
    Route::get('/signup', [SignupController::class, 'create'])->name('signup');
    Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});



// Route::get('/hello', [HelloController::class, 'welcome'])->name('Hello');

// Route::controller(MathController::class)->group(function () {
//     Route::prefix('math')->group(function () {
//         Route::name('math.')->group(function () {
//             Route::get('/sum/{a}/{b}', 'sum')->name('sum')->whereNumber(['a', 'b']);
//             Route::get('/subtract/{a}/{b}', 'subtract')->name('subtract')->whereNumber(['a', 'b']);
//         });
//     });
// });
