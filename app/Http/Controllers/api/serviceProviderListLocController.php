<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\nearserviceproviderassistancelocModel;

class serviceProviderListLocController extends Controller
{
    public function getServiceProvidersListF(){
        $data = nearserviceproviderassistancelocModel::orderBy('id', 'desc')->get();
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
     public function addServiceProvidersListF(Request $req){
        $validator = Validator::make($req->all(), [
            'user_id' => 'required',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    'user_id',
                    'service_provider_status',
                    'service_provider_loc',
                    'service_provider_loc_lat',
                    'service_provider_loc_lng',
                    'service_provider_number',
                    'service_provider_email',
                ],
            ], 404);
      }else{
        $check = nearserviceproviderassistancelocModel::create([
            'user_id' => $req->user_id,
            'service_provider_status' => $req->service_provider_status,
            'service_provider_loc' => $req->service_provider_loc,
            'service_provider_loc_lat' => $req->service_provider_loc_lat,
            'service_provider_loc_lng' => $req->service_provider_loc_lng,
            'service_provider_number' => $req->service_provider_number,
            'service_provider_email' => $req->service_provider_email,
        ]);
        if($check){
            return response()->json([
                "status" => true,
                "data" => 'Service Provider Added',
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Service Provider Faild to Add",
            ], 404);
        }}
    }
}