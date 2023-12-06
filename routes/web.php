<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//////////////////////
////////// for admin panel start
// Route::get('/wizostamp/login',  [adminAuthController::class, 'getLoginPageF'] );
// Route::post('/wizostamp/login', [adminAuthController::class, 'adminLoginF'])->name('loginpost');;
////////// for admin panel end




//////////////////////////////////////////////////////////////////////////
/////////// for clear cache 
Route::get('/clear/cache', function () {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('config:cache');
    $run = Artisan::call('route:clear');

    // $run = Artisan::call('view:clear');
    return 'Cleard';
});
//////////////////////////////////////////////////////////////////////////