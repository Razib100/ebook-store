<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\productController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Category
    Route::get('/category', [CategoryController::class, 'category'])->name('category');
    Route::get('/category/add/{id?}', [CategoryController::class, 'categoryAdd'])->name('category.add');
    Route::get('/category/view/{id?}', [CategoryController::class, 'categoryView'])->name('category.view');
    Route::post('/category/store', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');

    // Product
    Route::get('/product', [productController::class, 'product'])->name('product');
    Route::get('/product/add/{id?}', [productController::class, 'productAdd'])->name('product.add');
    Route::get('/product/view/{id?}', [productController::class, 'productView'])->name('product.view');
    Route::post('/product/store', [productController::class, 'productStore'])->name('product.store');
    Route::post('/product/update/{id}', [productController::class, 'productUpdate'])->name('product.update');
    Route::delete('/product/delete/{id}', [productController::class, 'productDelete'])->name('product.delete');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
