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
        Schema::create('adminchats', function (Blueprint $table) {
            $table->id();
            $table->string('from')->nullable()->default('user'); 
            $table->string('user_id')->nullable()->default('1'); 
            $table->string('msg')->nullable()->default('msg'); 
            $table->string('doc')->nullable()->default('doc'); 
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