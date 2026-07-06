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
        Schema::create('consultations', function (Blueprint $table) {

            $table->id();

            $table->string('reference')->unique();

            $table->foreignId('appointment_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->text('chief_complaint');

            $table->text('symptoms')->nullable();

            $table->text('diagnosis');

            $table->string('blood_pressure',20)->nullable();

            $table->unsignedSmallInteger('heart_rate')->nullable();

            $table->decimal('temperature',4,1)->nullable();

            $table->unsignedTinyInteger('respiratory_rate')->nullable();

            $table->unsignedTinyInteger('oxygen_saturation')->nullable();

            $table->decimal('weight',5,2)->nullable();

            $table->decimal('height',5,2)->nullable();

            $table->decimal('bmi',5,2)->nullable();

            $table->text('doctor_notes')->nullable();

            $table->boolean('follow_up_required')->default(false);

            $table->date('next_visit_date')->nullable();

            $table->timestamps();

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};