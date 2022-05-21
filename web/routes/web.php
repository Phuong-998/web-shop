<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
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



Route::prefix('/admin')->as('admin.')->group(function(){
    Route::get('home', function () {
        return view('home');
    });
   Route::get('/category',[CategoryController::class, 'index'])->name('category');
   Route::post('/add-Category',[CategoryController::class, 'hadnelAdd'])->name('add.category');
   Route::get('/update-Category/{id}',[CategoryController::class, 'update'])->name('update.category');
   Route::post('/hadnel-Category',[CategoryController::class, 'hadnelUpdate'])->name('hadnel-update.category');
   Route::post('/delete-Category',[CategoryController::class, 'deleteCategory'])->name('delete.category');

   Route::get('/products',[ProductController::class, 'index'])->name('products');
   Route::get('add-product',[ProductController::class, 'add'])->name('add.product');
   Route::post('/hadnel-product',[ProductController::class, 'hadnelAdd'])->name('hadnel.product');
   Route::get('update-product/{id}',[ProductController::class, 'update'])->name('update.product');
   Route::post('/hadnelUpdate-product',[ProductController::class, 'hadnelUpdate'])->name('hadnelUpdate.product');
   Route::post('delete-product',[ProductController::class,'deleteProduct'])->name('delete.ptoduct');
});
