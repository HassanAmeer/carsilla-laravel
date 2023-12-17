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
        Schema::create('carlistingdealers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->default('1'); 
            $table->string('is_dealer')->nullable()->default('yes'); 
            $table->string('is_top_dealer')->nullable()->default('yes'); 
            $table->string('company_img')->nullable()->default('icons/carred.png'); 
            $table->string('company_name')->nullable()->default(''); 
            $table->string('company_address')->nullable()->default(''); 
            $table->string('reviews')->nullable()->default('0'); 
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