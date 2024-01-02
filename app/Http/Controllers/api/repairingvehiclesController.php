<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\repairingvehiclesModel;
use Illuminate\Support\Facades\Validator;

class repairingvehiclesController extends Controller
{
    public function getRepairingCarsF(){
        $data = repairingvehiclesModel::orderBy('id', 'desc')->get();
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
     /////////// add repairing Cars
     public function addRepairingCarsF(Request $req){
        $validator = Validator::make($req->all(), [
            'user_id' => 'required',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    'user_id',
                    'vicle_img',
                    'car',
                    'model',
                    'year',
                    'choosed_spare_parts',
                    'details',
                    'location',
                    'charges', 
                    'is_paid',
                    'price',
                    'phone',
                    'is_repaird',
                ],
            ], 404);
      }else{
        $check = repairingvehiclesModel::create([
            'user_id' => $req->user_id,
            // 'vicle_img' => $req->vicle_img,
            'car' => $req->car,
            'model' => $req->model,
            'year' => $req->year,
            'choosed_spare_parts' => $req->choosed_spare_parts,
            'details' => $req->details,
            'location' => $req->location,
            'charges' => $req->charges,
            'is_paid' => $req->is_paid,
            'price' => $req->price,
            'phone' => $req->phone,
            'is_repaird' => $req->is_repaird,
        ]);
        if($check){
            return response()->json([
                "status" => true,
                "data" => 'Car For repairing Added',
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Try Later",
            ], 404);
        }}
    }
}