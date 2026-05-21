<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Product Management Routes
Route::resource('products', ProductController::class);
Route::get('/products-list', [ProductController::class, 'index'])->name('products.list');
