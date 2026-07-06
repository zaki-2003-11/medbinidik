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

            $table->id();

            // Appointment reference (generated automatically later)
            $table->string('reference')->unique();

            // Relations
            $table->foreignId('patient_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('doctor_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('doctor_location_id')
                ->constrained()
                ->cascadeOnDelete();

            // Appointment schedule
            $table->date('appointment_date');

            $table->time('start_time');

            $table->time('end_time');

            // Appointment type
            $table->enum('appointment_type', [
                'first_visit',
                'follow_up',
                'control',
                'emergency'
            ])->default('first_visit');

            // Booking source
            $table->enum('booking_source', [
                'patient',
                'doctor',
                'admin'
            ])->default('patient');

            // Patient reason
            $table->text('reason')->nullable();

            // Appointment status
            $table->enum('status', [
                'pending',
                'confirmed',
                'completed',
                'cancelled',
                'rejected',
                'no_show'
            ])->default('pending');

            // Status dates
            $table->timestamp('confirmed_at')->nullable();

            $table->timestamp('completed_at')->nullable();

            $table->timestamp('cancelled_at')->nullable();

            $table->text('cancellation_reason')->nullable();

            $table->timestamps();

            $table->softDeletes();

            // Indexes
            $table->index([
                'doctor_id',
                'appointment_date'
            ]);

            $table->index([
                'patient_id',
                'appointment_date'
            ]);

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