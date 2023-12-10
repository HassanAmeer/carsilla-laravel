<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workshopModel extends Model
{
    use HasFactory;
    protected $table = 'workshoptable';
    protected $fillable = [
        'id',
        'user_id',
        'user_name',
        'when_pickup_date',
        'where_pickup_address',
        'time',
        'car_name',
        'repair_or_addnewparts',
        'wich_repaired',
        'invoice_id',
    ];

}