<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'products'])->name('products');
Route::post('/add-product', [ProductController::class, 'addProduct'])->name('add.product');
