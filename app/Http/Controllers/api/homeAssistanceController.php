<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\invoicetableModel;
use App\Models\homeassistanceModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class homeAssistanceController extends Controller
{
    public function getHomeAssisF(){
        $allusers = homeassistanceModel::orderBy('id', 'desc')->get();
        if($allusers->count() > 0){
            return response()->json([
                "status" => true,
                "data" => $allusers,
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Records is Empty",
            ], 404);
        }
    }
     /////////// add workshop
     public function addHomeAssisF(Request $req){
        $validator = Validator::make($req->all(), [
            'user_id' => 'required',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    'user_id',
                    'when_pickup_date',
                    'from_pickup_address',
                    'from_address_lat',
                    'from_address_lng',
                    'coming_to_pickup_loc',
                    'coming_to_pickup_loc_lat',
                    'coming_to_pickup_loc_lng',
                    'time',
                    'category',
                ],
            ], 404);
      }else{
        $check = homeassistanceModel::create([
            'user_id' => $req->user_id,
            'when_pickup_date' => $req->when_pickup_date,
            'from_pickup_address' => $req->from_pickup_address,
            'from_address_lat' => $req->from_address_lat,
            'from_address_lng' => $req->from_address_lng,
            'coming_to_pickup_loc' => $req->coming_to_pickup_loc,
            'coming_to_pickup_loc_lat' => $req->coming_to_pickup_loc_lat,
            'coming_to_pickup_loc_lng' => $req->coming_to_pickup_loc_lng,
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
                "Message" => "Home Assistance Faild",
            ], 404);
        }}
    }
}