<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactiondetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'document_code',
        'document_number',
        'product_code',
        'price',
        'subtotal',
        'currency',
        'qty',
        'unit',
    ];
}
