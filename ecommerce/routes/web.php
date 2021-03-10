<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

Route::get('/', function () {
    return view('welcome');
});

//Product
Route::get('/product', [ProductsController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductsController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductsController::class, 'store'])->name('product.store');
