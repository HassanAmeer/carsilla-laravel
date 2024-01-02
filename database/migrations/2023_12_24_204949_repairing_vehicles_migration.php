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
        Schema::create('repairingvehicles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->default('1'); ///// temp 
            $table->string('vicle_img')->nullable()->default('spareparts/car.png'); 
            $table->string('car')->nullable()->default('Thomas Auto Work Shop'); 
            $table->string('model')->nullable()->default('1234'); 
            $table->string('year')->nullable()->default('1234'); 
            $table->string('choosed_spare_parts')->nullable()->default('55'); 
            $table->string('details')->nullable()->default('Something About This'); 
            $table->string('location')->nullable()->default('in Dubai ..'); 
            $table->string('charges')->nullable()->default('90');  //// 
            $table->string('is_paid')->nullable()->default('yes'); //// hours
            $table->string('phone')->nullable()->default('+97 01234567');
            $table->string('is_repaird')->nullable()->default('no');
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