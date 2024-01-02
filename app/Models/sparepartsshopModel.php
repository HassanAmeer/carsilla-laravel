<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sparepartsshopModel extends Model
{
    use HasFactory;
    protected $table = 'sparepartsshop';
    protected $fillable = [
    'id', 
    'user_id',
    'shop_img',
    'shop_tilte',
    'lat',
    'lng',
    'charge_price',
    'charge_type',
    'details',
    'price',
    'experience_years',
    'location',
    'phone',
    'reviews',
    ];
}