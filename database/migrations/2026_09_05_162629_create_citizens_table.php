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
        Schema::create('citizens', function (Blueprint $table) {
            $table->id('citizen_id'); 
            $table->string('passport_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('current_address');
            $table->timestamps();
        });

     //   Schema::table('appointments', function (Blueprint $table) {
       //     $table->foreign('citizen_id')->references('citizen_id')
       //     ->on('citizens')->onDelete('cascade');
       // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizens');
    }
};
