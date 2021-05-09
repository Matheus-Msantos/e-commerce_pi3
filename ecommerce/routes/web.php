<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\http\Controllers\TagController;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => 'isAdmin'], function(){
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

Route::resource('/product', ProductsController::class, ['only' => ['show']]);
Route::resource('/category', CategoriesController::class, ['only' => ['show']]);
Route::resource('/tag', TagController::class, ['only' => ['show']]);


