<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\workshopModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class workshopController extends Controller
{
    public function getworkshopF(){
        $data = workshopModel::orderBy('id', 'desc')->get();
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
    /////////// add workshop
    public function addworkshopF(Request $req){
        $validator = Validator::make($req->all(), [
            'user_id' => 'required',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    'user_id',
                    'user_name',
                    'when_pickup_date',
                    'where_pickup_address',
                    'time',
                    'car_name',
                    'repair_or_addnewparts',
                    'wich_repaired',
                ],
                "Message" => "Required All Fields",
            ], 404);
      }else{
        $check = workshopModel::create([
            // 'id' => $req->id,
            'user_id' => $req->user_id,
            'user_name' => $req->user_name,
            'when_pickup_date' => $req->when_pickup_date,
            'where_pickup_address' => $req->where_pickup_address,
            'time' => $req->time,
            'car_name' => $req->car_name,
            'repair_or_addnewparts' => $req->repair_or_addnewparts,
            'wich_repaired' => $req->wich_repaired,
        ]);
        if($check){
            return response()->json([
                "status" => true,
                "data" => 'Order Recieved',
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "List Can Not Be Added",
            ], 404);
        }}
    }
}