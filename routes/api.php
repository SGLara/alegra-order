<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'controller' => OrderController::class,
    'prefix' => 'orders',
], function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
});
