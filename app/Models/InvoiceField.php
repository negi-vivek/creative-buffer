<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceField extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'field_name',
        'field_value',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'id', 'invoice_id');
    }
}
