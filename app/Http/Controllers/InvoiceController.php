<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function create_invoice(Request $request)
    {
        $data = $request->all();
        dd($data);
    }
}
