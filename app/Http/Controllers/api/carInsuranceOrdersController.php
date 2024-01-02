<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\carInsuranceOrdersModel;

class carInsuranceOrdersController extends Controller
{
     //////////////// get method
    public function getAllInsuranceOrdersListF(){
        $data = carInsuranceOrdersModel::orderBy('id', 'desc')->get();
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
     //////////////// get method
    public function getInsuranceOrdersByUserIdF($id){
        $data = carInsuranceOrdersModel::orderBy('id', 'desc')->get();
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
    ///////////////////
    public function addInsranceOrderF(Request $req){
        $validator = Validator::make($req->all(), [
            'user_id' => 'required',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    'user_id',
                    'car',
                    'model',
                    'year',
                    'first_name',
                    'last_name',
                    'address',
                    'date_of_birth',
                    'car_license',
                    'car_img',
                    'car_name',
                    'number_plate',
                    'date_of_purchase',
                    'insu_start_date',
                    'insu_end_date',
                    'insu_fees',
                    'is_paid',
                    'paid_by',
                ],
            ], 200);
      }else{
            /////
            if ($req->hasFile('car_license')) {
                $doc = $req->file('car_license');
            $docname = time() . '.' . $doc->getClientOriginalExtension();
            $doc->move(public_path('insurance'), $docname);
            $car_license = 'insurance/'.$docname;
            }else {
                $car_license = 'icons/nofile.png';
            } 
            /////
            if ($req->hasFile('car_img')) {
                $img1 = $req->file('car_img');
            $imgname1 = time() . '.' . $img1->getClientOriginalExtension();
            $img1->move(public_path('insurance'), $imgname1);
            $car_img1 = 'insurance/'.$imgname1;
            }else {
                $car_img1 = 'icons/noimg.png';
            }  
            $check = carInsuranceOrdersModel::create([
                'user_id' => $req->user_id,
                'car' => $req->car,
                'model' => $req->model,
                'year' => $req->year,
                'first_name' => $req->first_name,
                'last_name' => $req->last_name,
                'address' => $req->address,
                'date_of_birth' => $req->date_of_birth,
                'car_license' => $car_license,
                'car_img' => $car_img1,
                'car_name' => $req->car_name,
                'number_plate' => $req->number_plate,
                'date_of_purchase' => $req->date_of_purchase,
                'insu_start_date' => $req->insu_start_date,
                'insu_end_date' => $req->insu_end_date,
                'insu_fees' => $req->insu_fees,
                'is_paid' => $req->is_paid,
                'paid_by' => $req->paid_by,
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