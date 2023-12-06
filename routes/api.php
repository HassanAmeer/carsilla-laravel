<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\allUsersController;
use App\Http\Controllers\api\workshopController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/////////////////////////////////////////////////////////
Route::get('getusers',  [allUsersController::class, 'getUsersApiF'] );
Route::post('updateprofile',  [allUsersController::class, 'UpdateProfileApiF'] );
Route::post('emailupdate',  [allUsersController::class, 'UpdateEmailApiF'] );
Route::post('passwordupdate',  [allUsersController::class, 'UpdatePasswordApiF'] );
Route::post('addworkshop',  [workshopController::class, 'addworkshopF'] );





/////////////////////////////////////////////////////////
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//////////////////////////////////
// cars_carsilla
// xwBCbdE3Exa757wB