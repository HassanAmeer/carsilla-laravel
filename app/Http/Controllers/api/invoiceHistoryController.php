<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\invoicetableModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class invoiceHistoryController extends Controller
{
    public function getInvoiceListF(){
        $data = invoicetableModel::orderBy('id', 'desc')->get();
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
     public function addInvoiceListF(Request $req){
        $validator = Validator::make($req->all(), [
            'user_id' => 'required',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    'user_id',
                    'invoice_id',
                    'invoice_title',
                    'invoice_desc',
                    'is_pay',
                    'pay_by',
                    'total_pay',
                ],
            ], 404);
      }else{
        $check = invoicetableModel::create([
            'user_id' => $req->user_id,
            'invoice_id' => $req->invoice_id,
            'invoice_title' => $req->invoice_title,
            'invoice_desc' => $req->invoice_desc,
            'is_pay' => $req->is_pay,
            'pay_by' => $req->pay_by,
            'total_pay' => $req->total_pay,
        ]);
        if($check){
            return response()->json([
                "status" => true,
                "data" => 'Invoice Added',
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Invoice Faild to Add",
            ], 404);
        }}
    }
}