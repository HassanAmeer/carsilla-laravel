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
        Schema::create('sparepartsshop', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->default('1'); ///// temp 
            $table->string('shop_img')->nullable()->default('spareparts/shop.png'); 
            $table->string('shop_tilte')->nullable()->default('Thomas Auto Work Shop'); 
            $table->string('lat')->nullable()->default('1234'); 
            $table->string('lng')->nullable()->default('1234'); 
            $table->string('charge_price')->nullable()->default('55'); 
            $table->string('charge_type')->nullable()->default('hour'); //// hours
            $table->string('details')->nullable()->default('Something About This'); 
            $table->string('price')->nullable()->default('45'); ///// AED
            $table->string('experience_years')->nullable()->default('12 Years'); 
            $table->string('location')->nullable()->default('in Dubai ..'); 
            $table->string('phone')->nullable()->default('+97 01234567'); 
            $table->string('reviews')->nullable()->default('1'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};