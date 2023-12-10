<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\invoicetableModel;
use App\Models\roadassistanceModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class roadAssistanceController extends Controller
{
    public function getRoadAssisF(){
        $data = roadassistanceModel::orderBy('id', 'desc')->get();
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
     public function addRoadAssisF(Request $req){
        $validator = Validator::make($req->all(), [
            'user_id' => 'required',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    'user_id',
                    'category',
                    'when_pickup_date',
                    'from_pickup_address',
                    'from_address_lat',
                    'from_address_lng',
                    'where_pickup_address',
                    'where_address_lat',
                    'where_address_lng',
                    'time',
                    'invoice_id',
                ],
            ], 404);
      }else{
        $check = roadassistanceModel::create([
            'user_id' => $req->user_id,
            'when_pickup_date' => $req->when_pickup_date,
            'from_pickup_address' => $req->from_pickup_address,
            'from_address_lat' => $req->from_address_lat,
            'from_address_lng' => $req->from_address_lng,
            'where_pickup_address' => $req->where_pickup_address,
            'where_address_lat' => $req->where_address_lat,
            'where_address_lng' => $req->where_address_lng,
            'time' => $req->time,
            'category' => $req->category,
        ]);
        $invoice_id = strtoupper(Str::random(16));
        invoicetableModel::create([
            'user_id' => $req->user_id,
            'invoice_id' => $invoice_id,
            'invoice_title' => 'Home Assistance',
            'invoice_desc' => 'Something',
            'is_pay' => '0',
            'pay_by' => 'byhand',
            'total_pay' => '100',
        ]);
        if($check){
            return response()->json([
                "status" => true,
                "data" => 'Order Recieved',
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Road Assistance Faild",
            ], 404);
        }}
    }
}