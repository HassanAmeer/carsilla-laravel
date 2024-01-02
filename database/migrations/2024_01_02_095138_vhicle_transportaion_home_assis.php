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
        Schema::create('vhicle_transportaion_home_assis', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->default('1'); 
            $table->string('when_pickup_date')->nullable()->default('thus,17 feb'); 
            $table->string('when_pickup_time')->nullable()->default('thus,17 feb'); 
            $table->string('where_to_pickup')->nullable()->default('Dubai Address'); 
            $table->string('where_to_pickup_lat')->nullable()->default('1234'); 
            $table->string('where_to_pickup_lng')->nullable()->default('1234'); 
            $table->string('where_to_drop')->nullable()->default('Dubai Address'); 
            $table->string('where_to_drop_lat')->nullable()->default('1234'); 
            $table->string('where_to_drop_lng')->nullable()->default('1234'); 
            $table->string('distance_between')->nullable()->default('2'); 
            $table->string('charges')->nullable()->default('Dubai Address');
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