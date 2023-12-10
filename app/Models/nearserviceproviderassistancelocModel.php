<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nearserviceproviderassistancelocModel extends Model
{
    use HasFactory;
    protected $table = 'nearserviceproviderassistanceloc';
    protected $fillable = [
        'id', 
        'user_id',
        'service_provider_status',
        'service_provider_loc',
        'service_provider_loc_lat',
        'service_provider_loc_lng',
        'service_provider_number',
        'service_provider_email',
    ];
}