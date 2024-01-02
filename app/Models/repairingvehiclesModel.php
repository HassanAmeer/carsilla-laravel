<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repairingvehiclesModel extends Model
{
    use HasFactory;
    protected $table = 'repairingvehicles';
    protected $fillable = [
        'user_id',
        'vicle_img',
        'car',
        'model',
        'year',
        'choosed_spare_parts',
        'details',
        'location',
        'charges',
        'is_paid',
        'price',
        'phone',
        'is_repaird',
    ];

}