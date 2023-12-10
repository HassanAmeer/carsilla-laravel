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
        Schema::create('workshoptable', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->default('1'); 
            $table->string('user_name')->nullable()->default('Name'); 
            $table->string('when_pickup_date')->nullable()->default('thus,17 feb'); 
            $table->string('where_pickup_address')->nullable()->default('Dubai Address'); 
            $table->string('time')->nullable()->default('10:00 AM');
            $table->string('car_name')->nullable()->default('Toyota');
            $table->string('repair_or_addnewparts')->nullable()->default('repair'); 
            $table->string('wich_repaired')->nullable()->default('seat_repair');
            $table->string('invoice_id')->nullable()->default('invoice1234');
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