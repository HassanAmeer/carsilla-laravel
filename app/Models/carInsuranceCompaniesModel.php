<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carInsuranceCompaniesModel extends Model
{
    use HasFactory;
    protected $table = 'carinsurancecompanies';
    protected $fillable = [
        "id","user_id","company_img","company_name","company_subtitle","phone","whatsapp","experience","reviews","location","monthly_charges","is_active",
    ];
}