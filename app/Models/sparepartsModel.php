<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sparepartsModel extends Model
{
    use HasFactory;
    protected $table = 'spareparts';
    protected $fillable = [
    'id', 
    'shop_id',
    'sparepart_img',
    'sparepart_shop',
    'sparepart_title',
    'details',
    'price',
    'experience_years',
    'location',
    'phone',
    'reviews',
    ];

    
}