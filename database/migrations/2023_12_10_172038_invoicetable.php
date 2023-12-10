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
        Schema::create('invoicetable', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable()->default('1'); 
            $table->string('invoice_id')->nullable()->default('1'); 
            $table->string('invoice_title')->nullable()->default('1'); 
            $table->string('invoice_desc')->nullable()->default('1'); 
            $table->string('is_pay')->nullable()->default('0'); // not pay
            $table->string('pay_by')->nullable()->default('byhand');
            $table->string('total_pay')->nullable()->default('100');
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