<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserProfile;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::post('/register', [AuthController::class, 'register'])->name('user.register');
Route::post('/login', [AuthController::class, 'login'])->name('user.login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/me', [UserProfile::class, "index"])->name('user.profile');
    Route::post('/update-profile', [UserProfile::class, "update"])->name('user.update');
    Route::post('/sync-amz', [UserProfile::class, "sync"])->name('user.sync');

    Route::apiResource('/products', ProductController::class);
    Route::apiResource('/orders', OrderController::class);
    Route::post('/checkout', [UserProfile::class, 'checkout'])->name('checkout');

});
Route::get('/success', [UserProfile::class, 'success'])->name('checkout.success');
Route::get('/cancel', [UserProfile::class, 'cancel'])->name('checkout.cancel');
