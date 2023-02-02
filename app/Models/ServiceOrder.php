<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $table = "service_order";

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'telephone',
        'alamat',
        'service',
        'jadwal',
        'jam',
    ];
}