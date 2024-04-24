<?php

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserController as UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\User\ProductController as ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');

Route::get('/admin/', [AdminUserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/product', [AdminProductController::class, 'index'])->name('admin.products.index');
Route::get('/admin/product/create', [AdminProductController::class, 'createForm'])->name('admin.products.create');
Route::post('/admin/product/create', [AdminProductController::class, 'create'])->name('product.create');
Route::post('/product/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('product.addToCart');
