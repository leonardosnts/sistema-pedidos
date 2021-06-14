<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;
    protected $table = 'sale_products';

    protected $fillable = [
        'sale_id',
        'product_id',
        'client_id',
        'amount',
        'value_product'
    ];

}
