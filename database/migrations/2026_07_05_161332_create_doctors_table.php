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
        Schema::create('doctors', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('specialty_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('phone', 20);

            $table->enum('gender', [
                'male',
                'female'
            ]);

            $table->date('date_of_birth');

            $table->string('national_id', 50)->unique();

            $table->string('license_number')->unique();

            $table->unsignedSmallInteger('years_experience')->default(0);

            $table->decimal('consultation_fee', 8, 2)->default(0);

            $table->text('biography')->nullable();

            $table->json('languages')->nullable();

            $table->enum('approval_status', [
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

            $table->decimal('average_rating', 3, 2)->default(0);

            $table->boolean('is_available')->default(true);

            $table->string('profile_photo')->nullable();

            $table->timestamps();

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};