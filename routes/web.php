<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ServiceController;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('customers',CustomerController::class);
Route::resource('services',ServiceController::class);

Route::get('/invoice/{invoiceId}/download', [InvoiceController::class, 'downloadInvoice'])->name('invoice.download');
Route::resource('invoice',InvoiceController::class);

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
