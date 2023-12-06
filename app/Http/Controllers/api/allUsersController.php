<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\allUsersModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class allUsersController extends Controller
{
    public function getUsersApiF(){
        $allusers = allUsersModel::orderBy('id', 'desc')->get();
        if($allusers->count() > 0){
            return response()->json([
                "status" => true,
                "data" => $allusers,
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Users Records is Empty",
            ], 404);
        }
    }
    
    /////////// update Password
    public function UpdatePasswordApiF(Request $req){
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'password' => 'required',
            // 'brandimg' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    'id',
                    'password',
                ],
                "Message" => "Required All Fields",
            ], 404);
      }else{
        $check = allUsersModel::find($req->id);
        if($check){
            $check->update([
                'password' => $req->password,
            ]);
            return response()->json([
                "status" => true,
                "data" => 'Password is Updated',
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Password Can Not Changed",
            ], 404);
        }}
    }
    /////////// update email
    public function UpdateEmailApiF(Request $req){
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'email' => 'required',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    'id',
                    'email',
                ],
                "Message" => "Required All Fields",
            ], 404);
      }else{
        $check = allUsersModel::find($req->id);
        if($check){
            $check->update([
                'email' => $req->email,
            ]);
            return response()->json([
                "status" => true,
                "data" => 'Email is Updated',
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Email Can Not Changed",
            ], 404);
        }}
    }
    
    /////////// update email
    public function UpdateProfileApiF(Request $req){
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            // 'brandimg' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    'id',
                    'profile',
                    'fname',
                    'lname',
                    'email',
                ],
                "optional fields" => [
                    'profile',
                ],
                "Message" => "Required All Fields",
            ], 404);
      }else{
        $check = allUsersModel::find($req->id);
        if($check){
            if ($req->hasFile('profile')) {
                $doc = $req->file('profile');
               $docname = time() . '.' . $doc->getClientOriginalExtension();
               $doc->move(public_path('icons'), $docname);
               $profileimage = 'icons/'.$docname;
           }else {
               $profileimage = $check->image;
           }
            
            $check->update([
                'image' => $profileimage,
                'fname' => $req->fname,
                'lname' => $req->lname,
                'email' => $req->email,
            ]);
            return response()->json([
                "status" => true,
                "data" => 'Profile is Updated',
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Profile Can Not Update",
            ], 404);
        }}
    }
}