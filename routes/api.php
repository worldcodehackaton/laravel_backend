<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\BasketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;

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

Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('basket', BasketController::class)->only(['index', 'show']);
Route::resource('delivery', DeliveryController::class)->only(['index', 'show']);
Route::resource('store', StoreController::class)->only(['index', 'show']);
Route::resource('product', ProductController::class)->only(['index', 'show']);
Route::resource('category', CategoryController::class)->only(['index']);
Route::resource('user', UserController::class)->only(['index']);

Route::get('store-rating', [StoreController::class, 'ratingView'])->name('store.sort');
