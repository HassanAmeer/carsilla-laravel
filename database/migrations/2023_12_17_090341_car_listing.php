<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carlisting', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->default('1'); 
            $table->integer('dealer_id')->nullable()->default(0); 
            $table->string('total_views')->nullable()->default('1'); 
            $table->string('listing_type')->nullable()->default('Car Type'); 
            $table->string('listing_model')->nullable()->default('Model'); 
            $table->string('listing_year')->nullable()->default('2023'); 
            $table->string('listing_title')->nullable()->default('Car Name'); 
            $table->string('listing_desc')->nullable()->default('something About This'); 
            $table->string('listing_img1')->nullable()->default('icons/notfound.png'); 
            $table->string('listing_img2')->nullable()->default('icons/notfound.png'); 
            $table->string('listing_img3')->nullable()->default('icons/notfound.png'); 
            $table->string('listing_img4')->nullable()->default('icons/notfound.png'); 
            $table->string('listing_img5')->nullable()->default('icons/notfound.png'); 
            // $table->string('listing_img6')->nullable()->default('icons/notfound.png'); 
            $table->string('listing_price')->nullable()->default('icons/notfound.png'); 
            $table->string('features_gear')->nullable()->default('auto'); //// autometic / manual
            $table->string('features_speed')->nullable()->default('120'); // KM/h
            $table->string('features_seats')->nullable()->default('4'); 
            $table->string('features_door')->nullable()->default('4'); 
            $table->string('features_fuel_type')->nullable()->default('Gasoline'); 
            $table->string('features_climate_zone')->nullable()->default('Dual Zone'); 
            $table->string('features_cylinders')->nullable()->default('4'); 
            $table->string('features_bluetooth')->nullable()->default('yes'); 
            $table->json('features_others')->nullable()->default(json_encode([])); 
            $table->timestamps();
        });
    }

//  1. Fuel Type:
// Gasoline (Petrol)
// Diesel
// Hybrid
// Electric
// Flex Fuel

// 2. Climate Zones:
// Single Zone
// Dual Zone
// Multi-Zone

// 4 Cylinders (4-Cyl): 
// 6 Cylinders (6-Cyl):
// 8 Cylinders (8-Cyl): 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};