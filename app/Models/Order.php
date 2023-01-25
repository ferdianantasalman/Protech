<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";

    protected $fillable = [
        'user_id',
        'name',
        'telepon',
        'method',
        'address',
        'total_product',
        'total_price',
        'date',
        'payment_status'
    ];
}