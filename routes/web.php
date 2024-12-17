<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.side');
});

Route::resource('customers',CustomerController::class);
Route::resource('services',ServiceController::class);
Route::resource('invoice',InvoiceController::class);
