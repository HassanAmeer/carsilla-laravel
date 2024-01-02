<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminChatsModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class adminChatsController extends Controller
{
       //////////////// get method
       public function getAllChatsF(){
        $data = adminChatsModel::orderBy('id', 'desc')->get();
        if($data->count() > 0){
            return response()->json([
                "status" => true,
                "data" => $data,
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Chats Empty",
            ], 404);
        }
    }
     //////////////// get method
    public function getChatsByUserIdF($id){
        // $data = adminChatsModel::orderBy('id', 'desc')->get();
        $data = adminChatsModel::where('user_id',$id)->get();
        if($data->count() > 0){
            return response()->json([
                "status" => true,
                "data" => $data,
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Chats is Empty",
            ], 404);
        }
    }
    ///////////////////
    public function addChatsF(Request $req){
        $validator = Validator::make($req->all(), [
            'user_id' => 'required',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    'user_id',
                    'from',
                    'msg',
                    'doc',
                ],
            ], 200);
      }else{
            /////
            if ($req->hasFile('doc')) {
                $doc = $req->file('doc');
            $docname = time() . '.' . $doc->getClientOriginalExtension();
            $doc->move(public_path('docs'), $docname);
            $car_doc = 'docs/'.$docname;
            }else {
                $car_doc = '0';
            }  
            $check = adminChatsModel::create([
                'user_id' => $req->user_id,
                'from' => $req->from,
                'msg' => $req->msg,
                'doc' => $car_doc,
            ]);
            if($check){
                return response()->json([
                    "status" => true,
                    "data" => 'Sent',
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

// adminChatsModel extends Model
// {
//     use HasFactory;
//     protected $table = 'adminchats';
//     protected $fillable = [
//         'id',
//         'from',
//         'user_id',
//         'msg',
//         'doc',