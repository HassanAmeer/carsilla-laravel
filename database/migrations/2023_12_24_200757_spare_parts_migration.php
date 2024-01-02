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
        Schema::create('spareparts', function (Blueprint $table) {
            $table->id();
            $table->string('shop_id')->nullable()->default('1'); ///// temp 
            $table->string('sparepart_img')->nullable()->default('spareparts/brakepad.png'); 
            $table->string('sparepart_shop')->nullable()->default('Auto Spare Parts Shop'); 
            $table->string('sparepart_title')->nullable()->default('Brake Pads'); 
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