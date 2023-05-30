<?php

use App\Http\Controllers\WebController;
use GuzzleHttp\Middleware;
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


Route::group(['middleware' => ['auth']], function() {
    Route::prefix('admin')->group(function (){

        Route::get('/dashboard',function(){
            return view('dashboard');
        });
    });
});


Route::resource('/portfolios', \App\Http\Controllers\PortfolioControl::class);

Route::resource('admin/MyPortfolio', \App\Http\Controllers\MyPortfolioControl::class);

Route::resource('admin/Category', \App\Http\Controllers\categoryControl::class);

Route::resource('admin/Skill', \App\Http\Controllers\SkillControl::class);

Route::resource('admin/Education', \App\Http\Controllers\EducationControl::class);

Route::resource('admin/Interest', \App\Http\Controllers\InterestControl::class);

Route::resource('admin/Contact', \App\Http\Controllers\ContactControl::class);

Route::resource('admin/Message', \App\Http\Controllers\MessageControl::class);

Route::get('/user/home', [App\Http\Controllers\WebController::class, 'home']);

Route::get('/user/about', [App\Http\Controllers\WebController::class, 'about']);

Route::get('/user/education', [App\Http\Controllers\WebController::class, 'education']);

Route::get('/user/interests', [App\Http\Controllers\WebController::class, 'interests']);

Route::get('/user/contact', [App\Http\Controllers\WebController::class, 'contact']);


Auth::routes([
    // 'register' => false,
    'confirm' => false,
]);

