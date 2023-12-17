<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carListingModel extends Model
{
    use HasFactory;
    protected $table = 'carlisting';
    protected $fillable = [
        'id', 
        'user_id',
        'dealer_id',
        'total_views',
        'listing_type',
        'listing_model',
        'listing_year',
        'listing_title',
        'listing_desc',
        'listing_img1',
        'listing_img2',
        'listing_img3',
        'listing_img4',
        'listing_img5',
        'listing_price',
        'features_gear',
        'features_speed',
        'features_seats',
        'features_door',
        'features_fuel_type',
        'features_climate_zone',
        'features_cylinders',
        'features_bluetooth',
        'features_others',
    ];
}