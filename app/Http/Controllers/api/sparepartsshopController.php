<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\sparepartsshopModel;
use App\Http\Controllers\Controller;

class sparepartsshopController extends Controller
{
    public function getSparePartsShopsF(){
        $data = sparepartsshopModel::orderBy('id', 'desc')->get();
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
}