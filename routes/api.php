<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::get('/status', [TestController::class, 'status']);
