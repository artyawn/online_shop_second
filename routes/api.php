<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
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

Route::post('register', [UserController::class, 'store']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function() {
    Route::get('me', [AuthController::class, 'me']);
    Route::get('paintings', [ProductController::class, 'index']);
    Route::get('user', [UserController::class, 'index']);
    Route::post('logout',[AuthController::class, 'logout']);
    Route::post('order', [OrderController::class, 'store']);
    Route::get('orders', [OrderController::class, 'index']);
    Route::put('user/{user}',[UserController::class, 'update']);
});

