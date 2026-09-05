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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id'); // Primary Key from your ERD
            $table->unsignedBigInteger('applicant_id')->nullable();
            $table->unsignedBigInteger('citizen_id')->nullable();
            
            // Connects directly to your users table primary key safely
            $table->foreignId('interviewer_staff_id')->constrained('users', 'staff_id')->onDelete('cascade');
            
            $table->dateTime('appointment_date');
            $table->string('purpose_of_visit');
            $table->string('status')->default('Scheduled'); // ['Scheduled', 'Completed', 'Canceled']
            $table->timestamps();

            // 🟢 FOREIGN KEY RELATIONSHIPS FOR CITIZENS AND APPLICANTS
            $table->foreign('applicant_id')->references('applicant_id')->on('visa_applicants')->cascadeOnDelete();
            $table->foreign('citizen_id')->references('citizen_id')->on('citizens')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
