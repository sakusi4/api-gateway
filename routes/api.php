<?php

use App\Http\Controllers\StockController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::get('/status', [TestController::class, 'status']);
Route::post('/stock', [StockController::class, 'store'])->name('stock.store');
Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::get('/stock/detail', [StockController::class, 'detail'])->name('stock.detail');
