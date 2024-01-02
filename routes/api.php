<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminChatsController;
use App\Http\Controllers\api\allUsersController;
use App\Http\Controllers\api\workshopController;
use App\Http\Controllers\api\carDealersController;
use App\Http\Controllers\api\carListingController;
use App\Http\Controllers\api\sparePartsController;
use App\Http\Controllers\api\homeAssistanceController;
use App\Http\Controllers\api\invoiceHistoryController;
use App\Http\Controllers\api\roadAssistanceController;
use App\Http\Controllers\api\sparepartsshopController;
use App\Http\Controllers\api\repairingvehiclesController;
use App\Http\Controllers\api\carInsuranceOrdersController;
use App\Http\Controllers\api\carInsuranceCompaniesController;
use App\Http\Controllers\api\serviceProviderListLocController;

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
// /getusers    // Get
// /updateprofile  // POST
// /emailupdate  // POST
// /passwordupdate  // POST
// /addworkshop  // POST
// /checkuserbyphone/{phone}  // GET
// /adduser  // POST
// /gethomeassis  // GET
// /addhomeassis  // POST
// /getroadassis  // GET
// /addroadassis  // POST
// /getserviceproviders // GET
// /addserviceproviders  // POST
// /getinvoices  // GET
// /addinvoice  // POST
/////////////////////////////////////////////////////////
Route::get('getusers',  [allUsersController::class, 'getUsersApiF'] );
Route::post('updateprofile',  [allUsersController::class, 'UpdateProfileApiF'] );
Route::post('emailupdate',  [allUsersController::class, 'UpdateEmailApiF'] );
Route::post('passwordupdate',  [allUsersController::class, 'UpdatePasswordApiF'] );
Route::post('addworkshop',  [workshopController::class, 'addworkshopF'] );
Route::get('checkuserbyphone/{phone}',  [allUsersController::class, 'checkUserByPhoneApiF'] );
Route::post('adduser',  [allUsersController::class, 'addUserF']);
/////// 
Route::get('getworkshop',  [workshopController::class, 'getworkshopF']);
Route::get('gethomeassis',  [homeAssistanceController::class, 'getHomeAssisF'] );
Route::post('addhomeassis',  [homeAssistanceController::class, 'addHomeAssisF']);
Route::get('getroadassis',  [roadAssistanceController::class, 'getRoadAssisF'] );
Route::post('addroadassis',  [roadAssistanceController::class, 'addRoadAssisF']);
Route::get('getserviceproviders',  [serviceProviderListLocController::class, 'getServiceProvidersListF'] );
Route::post('addserviceproviders',  [serviceProviderListLocController::class, 'addServiceProvidersListF']);
Route::get('getinvoices',  [invoiceHistoryController::class, 'getInvoiceListF'] );
Route::post('addinvoice',  [invoiceHistoryController::class, 'addInvoiceListF']);
////////
Route::get('getdealers',  [carDealersController::class, 'getListingDealersF'] );
Route::get('getlisting',  [carListingController::class, 'getCarListingF'] );
Route::post('addlisting',  [carListingController::class, 'addHomeAssisF'] );
////////
Route::post('addrepairingcars',  [repairingvehiclesController::class, 'addRepairingCarsF'] );
Route::get('getrepairingcars',  [repairingvehiclesController::class, 'getRepairingCarsF'] );
Route::get('getspareparts',  [sparePartsController::class, 'getSparePartsF'] );
Route::get('getsparepartsshops',  [sparepartsshopController::class, 'getSparePartsShopsF'] );
////////
Route::get('getinsurancecompanies',  [carInsuranceCompaniesController::class, 'getInsuranceCompaniesListF'] );
Route::get('getallinsuranceorders',  [carInsuranceOrdersController::class, 'getAllInsuranceOrdersListF'] );
Route::get('getinsuranceordersbyuserid/{id}',  [carInsuranceOrdersController::class, 'getInsuranceOrdersByUserIdF'] );
Route::post('addinsranceorder',  [carInsuranceOrdersController::class, 'addInsranceOrderF'] );

Route::get('getallchats',  [adminChatsController::class, 'getAllChatsF'] );
Route::get('getchatsbyid/{id}',  [adminChatsController::class, 'getChatsByUserIdF'] );
Route::post('addchats',  [adminChatsController::class, 'addChatsF'] );










/////////////////////////////////////////////////////////
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//////////////////////////////////
// cars_carsilla
// xwBCbdE3Exa757wB