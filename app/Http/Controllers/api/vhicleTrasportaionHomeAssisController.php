<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\invoicetableModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\vhicleTrasportaionHomeAssisModel;

class vhicleTrasportaionHomeAssisController extends Controller
{
    public function getallVhicleTHomeAssisF(){
        $data = vhicleTrasportaionHomeAssisModel::orderBy('id', 'desc')->get();
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
    //////////////
    public function getVhicleTHomeAssisByUserIdF($id){
        $data = vhicleTrasportaionHomeAssisModel::where('user_id', $id)->get();
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
    ///////////////
      public function addVhicleTransHomeAssisF(Request $req){
        $validator = Validator::make($req->all(), [
            'user_id' => 'required',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    // 'id', 
                    'user_id',
                    'when_pickup_date',
                    'when_pickup_time',
                    'where_to_pickup',
                    'where_to_pickup_lat',
                    'where_to_pickup_lng',
                    'where_to_drop',
                    'where_to_drop_lat',
                    'where_to_drop_lng',
                    'distance_between',
                    'charges',
                ],
            ], 200);
      }else{ 
            $check = vhicleTrasportaionHomeAssisModel::create([
                'user_id' => $req->user_id,
                'when_pickup_date' => $req->when_pickup_date,
                'when_pickup_time' => $req->when_pickup_time,
                'where_to_pickup' => $req->where_to_pickup,
                'where_to_pickup_lat' => $req->where_to_pickup_lat,
                'where_to_pickup_lng' => $req->where_to_pickup_lng,
                'where_to_drop' => $req->where_to_drop,
                'where_to_drop_lat' => $req->where_to_drop_lat,
                'where_to_drop_lng' => $req->where_to_drop_lng,
                'distance_between' => $req->distance_between,
                'charges' => $req->charges,
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
                    "Message" => "Something Went Wrong",
                ], 200);
            }
      }
    }
}



//         'id', 
//         'user_id',
//         'when_pickup_date',
//         'when_pickup_time',
//         'where_to_pickup',
//         'where_to_pickup_lat',
//         'where_to_pickup_lng',
//         'where_to_drop',
//         'where_to_drop_lat',
//         'where_to_drop_lng',
//         'distance_between',
//         'charges',