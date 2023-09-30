<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserProfile;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\OfferController;
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

    Route::get('/offers/ignored', [OfferController::class, "ignored"])->name('offers.ignored');
    Route::get('/offers/gone', [OfferController::class, "gone"])->name('offers.gone');
    Route::get('/offers/caught', [OfferController::class, "caught"])->name('offers.caught');

    Route::apiResource('/filters', FilterController::class);

    Route::post('/checkout', [UserProfile::class, 'checkout'])->name('checkout');

});

Route::post('/offers/create', [OfferController::class, 'create'])->name('offers.create');

Route::get('/success', [UserProfile::class, 'success'])->name('checkout.success');
Route::get('/cancel', [UserProfile::class, 'cancel'])->name('checkout.cancel');
