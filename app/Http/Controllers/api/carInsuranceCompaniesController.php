<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\carInsuranceCompaniesModel;

class carInsuranceCompaniesController extends Controller
{
    //////////////// get method
    public function getInsuranceCompaniesListF(){
        $data = carInsuranceCompaniesModel::orderBy('id', 'desc')->get();
        if($data->count() > 0){
            return response()->json([
                "status" => true,
                "data" => $data,
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Records is Empty",
            ], 404);
        }
    }
    ///////////////////
    
}



// class carInsuranceCompaniesModel extends Model
// {
//     use HasFactory;
//     protected $table = 'carinsurancecompanies';
//     protected $fillable = [
//         "id","user_id","company_img","company_name","company_subtitle","phone","whatsapp","experience","reviews","location","monthly_charges","is_active",
//     ];