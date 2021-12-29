<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->name('products.')->group(function () {

    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    
    Route::prefix('movement')->name('movement')->group(function () {
        Route::post('/', [ProductController::class, 'movement']);
        Route::get('/', [ProductController::class, 'list'])->name('.list');
    });

});