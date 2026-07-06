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
        Schema::create('consultation_diseases', function (Blueprint $table) {

            $table->id();

            $table->foreignId('consultation_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('disease_id')
                ->constrained()
                ->restrictOnDelete();

            $table->enum('status', [
                'suspected',
                'confirmed',
                'resolved',
                'chronic'
            ])->default('confirmed');

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->unique([
                'consultation_id',
                'disease_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation_diseases');
    }
};