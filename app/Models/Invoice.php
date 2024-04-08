<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'due_date',
        'business_logo_path',
        'amount',
        'igst',
        'total',
    ];

    public function invoice_fields(): HasMany
    {
        return $this->hasMany(InvoiceField::class, 'invoice_id', 'id');
    }

    public function line_items(): HasMany
    {
        return $this->hasMany(InvoiceLineItem::class, 'invoice_id', 'id');
    }

    public function getBusinessLogoPathAttribute($value): ?string
    {
        return $value ? asset('storage/'.$value) : null;
    }
}
