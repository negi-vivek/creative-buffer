<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceField;
use App\Models\InvoiceLineItem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Redirector;

class InvoiceController extends Controller
{
    public function create_invoice(Request $request): \Illuminate\Foundation\Application|Redirector|Application|RedirectResponse
    {
        $data = $request->all();
        $logoPath = null;
        if ($request->file('business_logo')) {
            $logoPath = $request->file('business_logo')->store('business_logos', 'public');
        }

        $invoice = Invoice::create([
            'invoice_number' => $data['invoice_number'],
            'invoice_date' => $data['invoice_date'],
            'due_date' => $data['due_date'],
            'amount' => $data['total_amount'] ?? 0,
            'igst' => $data['total_igst'] ?? 0,
            'total' => $data['grand_total'] ?? 0,
            'business_logo_path' => $logoPath,
        ]);

        $fieldNames = $data['fieldName'] ?? [];
        foreach ($fieldNames as $key => $fieldName) {
            InvoiceField::create([
                'invoice_id' => $invoice->id,
                'field_name' => $fieldName,
                'field_value' => $data['fieldValue'][$key] ?? null,
            ]);
        }

        $items = $data['item'] ?? [];

        foreach ($items as $key => $item) {
            if (! $item) {
                continue;
            }

            if (isset($data['thumbnail'][$key]) && $data['thumbnail'][$key] instanceof UploadedFile) {
                $thumbnail = $data['thumbnail'][$key]->store('invoice_items', 'public');
            } else {
                $thumbnail = null;
            }
            InvoiceLineItem::create([
                'invoice_id' => $invoice->id,
                'item' => $item,
                'gst_rate' => $data['gst_rate'][$key] ?? 0,
                'quantity' => $data['quantity'][$key] ?? 0,
                'rate' => $data['rate'][$key] ?? 0,
                'amount' => $data['amount'][$key] ?? 0,
                'igst' => $data['igst'][$key] ?? 0,
                'total' => $data['total'][$key] ?? 0,
                'description' => $data['description'][$key] ?? '',
                'thumbnail_path' => $thumbnail,
            ]);
        }

        return redirect("invoice/{$invoice->id}");
    }

    public function view_invoice(Invoice $invoice): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('invoice')->with('invoice', $invoice);
    }
}
