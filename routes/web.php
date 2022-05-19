<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ExternalLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//shop page
Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/dashboard', [ShopController::class, 'dashboard'])->name('shop.dashboard');

//products (for logged users)
Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');
    Route::get('/dashboard/products', [ProductController::class, 'user_index'])->name('products.user-index');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/{product}/edit', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

//products (for guest)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

//orders
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/orders', [OrderItemController::class, 'index'])->name('orders.index');
    Route::post('/dashboard/orders/submit', [OrderItemController::class, 'submit'])->name('orders.submit');
});

//login providers
Route::get('/login/{provider}', [ExternalLoginController::class, 'redirect'])->name('login.external');
Route::get('/login/{provider}/callback', [ExternalLoginController::class, 'handleCallback']);

require __DIR__.'/auth.php';
