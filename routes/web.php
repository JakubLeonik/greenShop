<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
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
//main page
Route::get('/', MainController::class)->name('main.index');

//products (for guest)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

//add products (for logged users)
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware(['auth', 'verified']);
Route::post('/products/create', [ProductController::class, 'store'])->name('products.store')->middleware(['auth', 'verified']);
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware(['auth', 'verified']);
Route::post('/products/{product}/edit', [ProductController::class, 'update'])->name('products.update')->middleware(['auth', 'verified']);
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware(['auth', 'verified']);

//orders
Route::get('/dashboard/orders', [OrderController::class, 'index'])->name('orders.index')->middleware(['auth', 'verified']);
Route::post('/dashboard/orders/store', [OrderController::class, 'store'])->name('orders.store')->middleware(['auth', 'verified']);

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(['auth', 'verified']);
Route::get('/dashboard/my-products', [DashboardController::class, 'my_products'])->name('dashboard.my-products')->middleware(['auth', 'verified']);
Route::get('/dashboard/shopping-card', [DashboardController::class, 'shopping_card'])->name('dashboard.shopping-card')->middleware(['auth', 'verified']);

//login providers
Route::get('/login/{provider}', [ExternalLoginController::class, 'redirect'])->name('login.external');
Route::get('/login/{provider}/callback', [ExternalLoginController::class, 'handleCallback']);

require __DIR__.'/auth.php';
