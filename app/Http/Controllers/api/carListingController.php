<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\allUsersModel;
use App\Models\carDealersModel;
use App\Models\carListingModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class carListingController extends Controller
{
    public function getCarListingF(){
        $data = carListingModel::orderBy('id', 'desc')->get();
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
    ///////// add car listing
    public function addHomeAssisF(Request $req){
        $validator = Validator::make($req->all(), [
            'user_id' => 'required',
       ]);
      if($validator->fails()){
            return response()->json([
                "status" => false,
                "required fields" => [
                    // 'id', 
                    'user_id',
                    'dealer_id',
                    'total_views',
                    'listing_type',
                    'listing_model',
                    'listing_year',
                    'listing_title',
                    'listing_desc',
                    'listing_img1',
                    'listing_img2',
                    'listing_img3',
                    'listing_img4',
                    'listing_img5',
                    'listing_price',
                    'features_gear',
                    'features_speed',
                    'features_seats',
                    'features_door',
                    'features_fuel_type',
                    'features_climate_zone',
                    'features_cylinders',
                    'features_bluetooth',
                    'features_others',
                ],
            ], 404);
      }else{
        
        //////// check if registered with dealers 
        $haveuser = carDealersModel::where('user_id', $req->user_id)->first();
        $userdata = allUsersModel::find($req->user_id);
        if($haveuser){
            
            ////////// handle images start
            if ($req->hasFile('listing_img1')) {
                $img1 = $req->file('listing_img1');
               $imgname1 = time() . '.' . $img1->getClientOriginalExtension();
               $img1->move(public_path('listings'), $imgname1);
               $listing_img1 = 'listings/'.$imgname1;
            }else {
                $listing_img1 = 'icons/noimg.png';
            } 
            /////
            if ($req->hasFile('listing_img2')) {
                $img2 = $req->file('listing_img2');
               $imgname2 = time() . '.' . $img2->getClientOriginalExtension();
               $img2->move(public_path('listings'), $imgname2);
               $listing_img2 = 'listings/'.$imgname2;
            }else {
                $listing_img2 = 'icons/noimg.png';
            } 
            /////
            if ($req->hasFile('listing_img3')) {
                $img3 = $req->file('listing_img3');
               $imgname3 = time() . '.' . $img3->getClientOriginalExtension();
               $img3->move(public_path('listings'), $imgname3);
               $listing_img3 = 'listings/'.$imgname3;
            }else {
                $listing_img3 = 'icons/noimg.png';
            } 
            /////
            if ($req->hasFile('listing_img4')) {
                $img4 = $req->file('listing_img4');
               $imgname4 = time() . '.' . $img4->getClientOriginalExtension();
               $img4->move(public_path('listings'), $imgname4);
               $listing_img4 = 'listings/'.$imgname4;
            }else {
                $listing_img4 = 'icons/noimg.png';
            } 
            /////
            if ($req->hasFile('listing_img5')) {
                $img5 = $req->file('listing_img5');
               $imgname5 = time() . '.' . $img5->getClientOriginalExtension();
               $img5->move(public_path('listings'), $imgname5);
               $listing_img5 = 'listings/'.$imgname5;
            }else {
                $listing_img5 = 'icons/noimg.png';
            } 
            /////
            ////////// handle images end
        
        $lastRecord = carDealersModel::latest()->first();
        $check = carListingModel::create([
            'user_id' => $req->user_id,
            'dealer_id' => $haveuser->id,
            'total_views' => '1',
            'listing_type'     => $req->listing_type,
            'listing_model'    => $req->listing_model,
            'listing_year'     => $req->listing_year,
            'listing_title'    => $req->listing_title,
            'listing_desc'     => $req->listing_desc,
            'listing_img1'     => $listing_img1,
            'listing_img2'     => $listing_img2,
            'listing_img3'     => $listing_img3,
            'listing_img4'     => $listing_img4,
            'listing_img5'     => $listing_img5,
            'listing_price'    => $req->listing_price,
            'features_gear'    => $req->features_gear,
            'features_speed'   => $req->features_speed,
            'features_seats'   => $req->features_seats,
            'features_door'    => $req->features_door,
            'features_fuel_type'  => $req->features_fuel_type,
            'features_climate_zone' => $req->features_climate_zone,
            'features_cylinders'    => $req->features_cylinders,
            'features_bluetooth'    => $req->features_bluetooth,
            'features_others'       => $req->features_others,
        ]);
        
        if($check){
            return response()->json([
                "status" => true,
                "data" => 'Listing Successfully',
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Car Listing Faild",
            ], 404);
        }
            
        }else{
           carDealersModel::create([
            // 'id', 
            'user_id' => $req->user_id,
            'is_dealer' => 'yes',
            'is_top_dealer' => 'yes',
            'company_img' => $userdata->image,
            'company_name' => $userdata->fname,
            'company_address' => 'Address',
            'reviews' => '1.0',
        ]); 
        


        ////////// handle images start
        if ($req->hasFile('listing_img1')) {
            $img1 = $req->file('listing_img1');
           $imgname1 = time() . '.' . $img1->getClientOriginalExtension();
           $img1->move(public_path('listings'), $imgname1);
           $listing_img1 = 'listings/'.$imgname1;
        }else {
            $listing_img1 = 'icons/noimg.png';
        } 
        /////
        if ($req->hasFile('listing_img2')) {
            $img2 = $req->file('listing_img2');
           $imgname2 = time() . '.' . $img2->getClientOriginalExtension();
           $img2->move(public_path('listings'), $imgname2);
           $listing_img2 = 'listings/'.$imgname2;
        }else {
            $listing_img2 = 'icons/noimg.png';
        } 
        /////
        if ($req->hasFile('listing_img3')) {
            $img3 = $req->file('listing_img3');
           $imgname3 = time() . '.' . $img3->getClientOriginalExtension();
           $img3->move(public_path('listings'), $imgname3);
           $listing_img3 = 'listings/'.$imgname3;
        }else {
            $listing_img3 = 'icons/noimg.png';
        } 
        /////
        if ($req->hasFile('listing_img4')) {
            $img4 = $req->file('listing_img4');
           $imgname4 = time() . '.' . $img4->getClientOriginalExtension();
           $img4->move(public_path('listings'), $imgname4);
           $listing_img4 = 'listings/'.$imgname4;
        }else {
            $listing_img4 = 'icons/noimg.png';
        } 
        /////
        if ($req->hasFile('listing_img5')) {
            $img5 = $req->file('listing_img5');
           $imgname5 = time() . '.' . $img5->getClientOriginalExtension();
           $img5->move(public_path('listings'), $imgname5);
           $listing_img5 = 'listings/'.$imgname5;
        }else {
            $listing_img5 = 'icons/noimg.png';
        } 
        /////
        ////////// handle images end
        
        
        $lastRecord = carDealersModel::latest()->first();
        $check = carListingModel::create([
            'user_id' => $req->user_id,
            'dealer_id' => $lastRecord->id,
            'total_views' => '1',
            'listing_type'     => $req->listing_type,
            'listing_model'    => $req->listing_model,
            'listing_year'     => $req->listing_year,
            'listing_title'    => $req->listing_title,
            'listing_desc'     => $req->listing_desc,
            'listing_img1'     => $listing_img1,
            'listing_img2'     => $listing_img2,
            'listing_img3'     => $listing_img3,
            'listing_img4'     => $listing_img4,
            'listing_img5'     => $listing_img5,
            'listing_price'    => $req->listing_price,
            'features_gear'    => $req->features_gear,
            'features_speed'   => $req->features_speed,
            'features_seats'   => $req->features_seats,
            'features_door'    => $req->features_door,
            'features_fuel_type'  => $req->features_fuel_type,
            'features_climate_zone' => $req->features_climate_zone,
            'features_cylinders'    => $req->features_cylinders,
            'features_bluetooth'    => $req->features_bluetooth,
            'features_others'       => $req->features_others,
        ]);
        
        if($check){
            return response()->json([
                "status" => true,
                "data" => 'Listing Successfully',
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "Message" => "Car Listing Faild",
            ], 404);
        }
        }
       }
    }
}

// carListingModel
// 'id', 
// 'user_id',
// 'dealer_id',
// 'total_views',
// 'listing_type',
// 'listing_model',
// 'listing_year',
// 'listing_title',
// 'listing_desc',
// 'listing_img1',
// 'listing_img2',
// 'listing_img3',
// 'listing_img4',
// 'listing_img5',
// 'listing_price',
// 'features_gear',
// 'features_speed',
// 'features_seats',
// 'features_door',
// 'features_fuel_type',
// 'features_climate_zone',
// 'features_cylinders',
// 'features_bluetooth',
// 'features_others',