<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLineItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'item',
        'gst_rate',
        'quantity',
        'rate',
        'amount',
        'igst',
        'total',
        'description',
        'thumbnail_path',
    ];

    public function getThumbnailPathAttribute($value): ?string
    {
        return $value ? asset('storage/'.$value) : null;
    }
}
