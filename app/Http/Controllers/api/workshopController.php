<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\workshopModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class workshopController extends Controller
{
    /////////// add workshop
    public function addworkshopF(Request $req){
        $validator = Validator::make($req->all(), [
            'id' => 'required',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    'id',
                    'user_id',
                    'user_name',
                    'when_pickup_date',
                    'where_pickup_address',
                    'time',
                    'car_name',
                    'repair_or_addnewparts',
                    'wich_repaired',
                    'is_pay',
                    'pay_by',
                    'total_pay',
                ],
                "Message" => "Required All Fields",
            ], 404);
      }else{
        $check = workshopModel::create([
            'id' => $req->id,
            'user_id' => $req->user_id,
            'user_name' => $req->user_name,
            'when_pickup_date' => $req->when_pickup_date,
            'where_pickup_address' => $req->where_pickup_address,
            'time' => $req->time,
            'car_name' => $req->car_name,
            'repair_or_addnewparts' => $req->repair_or_addnewparts,
            'wich_repaired' => $req->wich_repaired,
            'is_pay' => $req->is_pay,
            'pay_by' => $req->pay_by,
            'total_pay' => $req->total_pay,
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