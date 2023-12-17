<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\carDealersModel;
use App\Http\Controllers\Controller;

class carDealersController extends Controller
{
    public function getListingDealersF(){
        $data = carDealersModel::orderBy('id', 'desc')->get();
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
    ///////// 
}

// carDealersModel
// 'id', 
// 'user_id',
// 'is_dealer',
// 'is_top_dealer',
// 'is_top_dealer',
// 'company_img',
// 'company_name',
// 'company_address',
// 'reviews',