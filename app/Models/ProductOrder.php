<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

    protected $table = "product_order";

    protected $fillable = [
        'user_id',
        'name',
        'telepon',
        'method',
        'alamat',
        'total_product',
        'total_price',
        'date',
        'status'
    ];
}