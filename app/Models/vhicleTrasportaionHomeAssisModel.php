<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vhicleTrasportaionHomeAssisModel extends Model
{
    use HasFactory;
    protected $table = 'vhicle_transportaion_home_assis';
    protected $fillable = [
        'id', 
        'user_id',
        'when_pickup_date',
        'when_pickup_time',
        'where_to_pickup',
        'where_to_pickup_lat',
        'where_to_pickup_lng',
        'where_to_drop',
        'where_to_drop_lat',
        'where_to_drop_lng',
        'distance_between',
        'charges',
    ];
}