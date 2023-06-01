<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/news', [\App\Http\Controllers\NewsController::class,'store'])->name('news.store');
Route::get('/news', [\App\Http\Controllers\NewsController::class,'index'])->name('news.index');
Route::get('/twitter', [\App\Http\Controllers\TwitterController::class,'index'])->name('twitter.search');
Route::get('/instagram', [\App\Http\Controllers\InstagramController::class,'index'])->name('instagram.search');

Route::post('/user/platform', [\App\Http\Controllers\UserPlatformController::class,'store']);


