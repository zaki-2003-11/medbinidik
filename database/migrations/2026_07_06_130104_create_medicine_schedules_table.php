<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medicine_schedules', function (Blueprint $table) {

            $table->id();

            $table->foreignId('prescription_medicine_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->date('start_date');

            $table->date('end_date');

            $table->unsignedTinyInteger('times_per_day');

            $table->unsignedTinyInteger('interval_hours')->nullable();

            $table->time('first_dose_time');

            $table->boolean('is_active')->default(true);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medicine_schedules');
    }
};