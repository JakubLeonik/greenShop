<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
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

//all products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

//add product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware(['auth', 'verified']);
Route::post('/products/create', [ProductController::class, 'store'])->name('products.store')->middleware(['auth', 'verified']);

//show product
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

//edit product
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware(['auth', 'verified']);
Route::post('/products/{product}/edit', [ProductController::class, 'update'])->name('products.update')->middleware(['auth', 'verified']);

//delete product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware(['auth', 'verified']);

//dashboard
Route::get('/dashboard', DashboardController::class)->name('dashboard.index')->middleware(['auth', 'verified']);

//login providers
Route::get('/login/{provider}', [ExternalLoginController::class, 'redirect'])->name('login.external');
Route::get('/login/{provider}/callback', [ExternalLoginController::class, 'handleCallback']);

require __DIR__.'/auth.php';
