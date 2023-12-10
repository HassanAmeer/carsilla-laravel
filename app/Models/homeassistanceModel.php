<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homeassistanceModel extends Model
{
    use HasFactory;
    protected $table = 'homeassistance';
    protected $fillable = [
        'id', 
        'user_id',
        'when_pickup_date',
        'from_pickup_address',
        'from_address_lat',
        'from_address_lng',
        'coming_to_pickup_loc',
        'coming_to_pickup_loc_lat',
        'coming_to_pickup_loc_lng',
        'time',
        'category',
        'invoice_id',
    ];
}