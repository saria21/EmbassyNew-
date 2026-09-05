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
        Schema::create('visa_applicants', function (Blueprint $table) {
            $table->id('applicant_id'); // Primary Key from your ERD
            $table->string('passport_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nationality');
            $table->timestamps();
        });
     //   Schema::table('appointments', function (Blueprint $table) {
       //     $table->foreign('applicant_id')->references('applicant_id')->on('visa_applicants')->onDelete('cascade');
     //   });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_applicants');
    }
};
