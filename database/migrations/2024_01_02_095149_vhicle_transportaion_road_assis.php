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
        Schema::create('roadassistance', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->default('1'); 
            $table->string('category')->nullable()->default('car');
            $table->string('from_pickup_address')->nullable()->default('Dubai Address'); 
            $table->string('from_address_lat')->nullable()->default('192'); 
            $table->string('from_address_lng')->nullable()->default('192'); 
            $table->string('where_pickup_address')->nullable()->default('Dubai Address'); 
            $table->string('where_address_lat')->nullable()->default('Dubai Address'); 
            $table->string('where_address_lng')->nullable()->default('Dubai Address'); 
            $table->string('when_pickup_date')->nullable()->default('thus,17 feb'); 
            $table->string('time')->nullable()->default('10:00 AM');
            $table->string('invoice_id')->nullable()->default('car');
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