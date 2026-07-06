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
        Schema::create('doctor_patient_relationships', function (Blueprint $table) {

            $table->id();

            $table->foreignId('doctor_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('patient_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->boolean('is_favorite')
                ->default(false);

            $table->date('first_visit_at')
                ->nullable();

            $table->date('last_visit_at')
                ->nullable();

            $table->unsignedInteger('visits_count')
                ->default(0);

            $table->text('notes')
                ->nullable();

            $table->timestamps();

            $table->unique([
                'doctor_id',
                'patient_id'
            ]);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_patient_relationships');
    }
};