<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\OrdersController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    
    Route::get('products', [ProductsController::class, 'index'])->name('products');

Route::prefix('admin')->group(function()
{
    Route::get('logout', [LogoutController::class, 'index'])->name('logout');

    Route::get('products', [ProductsController::class, 'index'])->name('products');
    Route::post('products', [ProductsController::class, 'store'])->name('products.store');
    Route::delete('products/{product}', [ProductsController::class, 'delete'])->name('products.delete');
    Route::put('products/{product}', [ProductsController::class, 'update'])->name('products.update');
});

Route::prefix('user')->group(function()
{
    Route::get('products', [ProductsController::class, 'index'])->name('products');
    Route::post('cart/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::delete('cart/{product}', [CartController::class, 'delete'])->name('cart.delete');

    Route::post('orders', [OrdersController::class, 'store'])->name('orders.store');
    Route::get('orders', [OrdersController::class, 'index'])->name('orders');

    Route::get('logout', [LogoutController::class, 'index'])->name('logout');
});

   