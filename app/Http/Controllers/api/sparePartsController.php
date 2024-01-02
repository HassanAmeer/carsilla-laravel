<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\sparepartsModel;
use App\Http\Controllers\Controller;

class sparePartsController extends Controller
{
    public function getSparePartsF(){
        $data = sparepartsModel::orderBy('id', 'desc')->get();
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