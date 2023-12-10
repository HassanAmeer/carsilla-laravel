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
        Schema::create('nearserviceproviderassistanceloc', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->default('1'); 
            $table->string('service_provider_status')->nullable()->default('active'); 
            $table->string('service_provider_loc')->nullable()->default('dubai'); 
            $table->string('service_provider_loc_lat')->nullable()->default('100'); 
            $table->string('service_provider_loc_lng')->nullable()->default('100'); 
            $table->string('service_provider_number')->nullable()->default('9712'); 
            $table->string('service_provider_email')->nullable()->default('email@gmail.com'); 
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