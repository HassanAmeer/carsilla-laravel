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
        Schema::create('carinsurancecompanies', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->default('1'); ///// temp 
            $table->string('company_img')->nullable()->default('icons/noimg.png'); 
            $table->string('company_name')->nullable()->default('toyota'); 
            $table->string('company_subtitle')->nullable()->default('insurance company'); 
            $table->string('phone')->nullable()->default('0301234567'); 
            $table->string('whatsapp')->nullable()->default('0301234567'); 
            $table->string('experience')->nullable()->default('1 year'); // years
            $table->string('reviews')->nullable()->default('4'); 
            $table->string('location')->nullable()->default('Dubai'); 
            $table->string('monthly_charges')->nullable()->default('100'); 
            $table->string('is_active')->nullable()->default('yes'); 
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