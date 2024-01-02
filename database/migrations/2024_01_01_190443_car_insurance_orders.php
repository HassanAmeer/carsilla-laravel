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
        Schema::create('carinsuranceorders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->default('1'); ///// temp 
            $table->string('car')->nullable()->default('toyota'); 
            $table->string('model')->nullable()->default('model'); 
            $table->string('year')->nullable()->default('1234'); 
            $table->string('first_name')->nullable()->default('fname'); 
            $table->string('last_name')->nullable()->default('lname'); 
            $table->string('address')->nullable()->default('address'); 
            $table->string('date_of_birth')->nullable()->default('1/2/2024'); 
            $table->string('car_license')->nullable()->default('license'); 
            $table->string('car_img')->nullable()->default('icons/blackcar.png'); 
            $table->string('car_name')->nullable()->default('car_name');  //// 
            $table->string('number_plate')->nullable()->default('1234'); //// hours
            $table->string('date_of_purchase')->nullable()->default('01/02/2024');
            $table->string('insu_start_date')->nullable()->default('01/02/2024');
            $table->string('insu_end_date')->nullable()->default('01/02/2024');
            $table->string('insu_fees')->nullable()->default('100');
            $table->string('is_paid')->nullable()->default('no');
            $table->string('paid_by')->nullable()->default('paypal');
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