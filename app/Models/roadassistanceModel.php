<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roadassistanceModel extends Model
{
    use HasFactory;
    protected $table = 'roadassistance';
    protected $fillable = [
        'id', 
        'user_id',
        'category',
        'from_pickup_address',
        'from_address_lat',
        'from_address_lng',
        'where_pickup_address',
        'where_address_lat',
        'where_address_lng',
        'when_pickup_date',
        'time',
        'invoice_id',
    ];
}