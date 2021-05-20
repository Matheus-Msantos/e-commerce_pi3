<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\http\Controllers\TagController;
use App\http\Controllers\CartsController;

require __DIR__.'/auth.php';

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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => 'isAdmin'], function() {
  //Product, category and tags
  Route::resource('/product', ProductsController::class, ['except' => ['show']]);
  Route::get('trash/product', [ProductsController::class, 'trash'])->name('product.trash');
  Route::patch('restore/product/{id}', [ProductsController::class, 'restore'])->name('product.restore');

  Route::resource('/category', CategoriesController::class, ['except' => ['show']]);
  Route::get('trash/category', [CategoriesController::class, 'trash'])->name('category.trash');
  Route::patch('restore/category/{id}', [categoriesController::class, 'restore'])->name('category.restore');

  Route::resource('/tag', TagController::class, ['except' => ['show']]);
  Route::get('trash/tag', [TagController::class, 'trash'])->name('tag.trash');
  Route::patch('restore/tag/{id}', [TagController::class, 'restore'])->name('tag.restore');
});

Route::group(['middleware' => 'auth'], function() {
  Route::get('/cart/add/{product}', [CartsController::class, 'add'])->name('cart.add');
  Route::get('/cart/remove/{product}', [CartsController::class, 'remove'])->name('cart.remove');
  Route::get('cart/payment', [CartsController::class, 'payment'])->name('cart.payment');
  Route::get('cart', [CartsController::class, 'show'])->name('cart.show');
});

Route::resource('/product', ProductsController::class, ['only' => ['show']]);
Route::resource('/category', CategoriesController::class, ['only' => ['show']]);
Route::resource('/tag', TagController::class, ['only' => ['show']]);


