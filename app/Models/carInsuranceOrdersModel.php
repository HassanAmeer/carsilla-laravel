<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carInsuranceOrdersModel extends Model
{
    use HasFactory;
    protected $table = 'carinsuranceorders';
    protected $fillable = [
        'id',
        'user_id',
        'car',
        'model',
        'year',
        'first_name',
        'last_name',
        'address',
        'date_of_birth',
        'car_license',
        'car_img',
        'car_name',
        'number_plate',
        'date_of_purchase',
        'insu_start_date',
        'insu_end_date',
        'insu_fees',
        'is_paid',
        'paid_by',
    ];

}