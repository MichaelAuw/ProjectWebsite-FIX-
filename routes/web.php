<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function (){

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/charts', function () {
        return view('charts');
    });

    Route::get('/tables', function () {
        return view('tables');
    });
});

Route::prefix('guest')->group(function (){

    Route::get('/login', function () {
        return view('login');
    });

    Route::get('/register', function () {
        return view('register');
    });
});

Route::prefix('user')->group(function (){

    Route::get('/home', function () {
        return view('index');
    });
});

// Route::get('/admin/dashboard', [App\Http\Controllers\WebController::class, 'admin']);

// Route::get('/admin/charts', [App\Http\Controllers\WebController::class, 'charts']);

// Route::get('/admin/tables', [App\Http\Controllers\WebController::class, 'tables']);

Auth::routes([
    'register' => false,
    'confirm' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
