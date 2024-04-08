<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/invoice/{invoice}', [InvoiceController::class, 'view_invoice']);
Route::post('/invoice', [InvoiceController::class, 'create_invoice']);
