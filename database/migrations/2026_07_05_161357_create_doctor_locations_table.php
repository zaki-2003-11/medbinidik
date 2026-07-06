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
        Schema::disableForeignKeyConstraints();
        Schema::create('doctor_locations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('doctor_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('office_name');

            $table->string('address');

            $table->string('city');

            $table->string('postal_code')->nullable();

            $table->decimal('latitude', 10, 8);

            $table->decimal('longitude', 11, 8);

            $table->string('phone', 20)->nullable();

            $table->boolean('is_main')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_locations');
    }
};
