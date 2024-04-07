<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/invoice', [\App\Http\Controllers\InvoiceController::class, 'create_invoice']);
