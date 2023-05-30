<?php

use App\Http\Controllers\ApiControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::resource('MyPortfolio',\App\Http\Controllers\ApiControl::class);

Route::get('MyPortfolio',[\App\Http\Controllers\ApiControl::class,'index']);
Route::post('MyPortfolio',[\App\Http\Controllers\ApiControl::class,'store']);
Route::put('MyPortfolio/{id}',[\App\Http\Controllers\ApiControl::class,'update']);
Route::delete('MyPortfolio/{id}',[\App\Http\Controllers\ApiControl::class,'destroy']);