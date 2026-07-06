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
        Schema::create('diseases', function (Blueprint $table) {

            $table->id();

            // ICD-10 code (optional)
            $table->string('code', 20)->unique()->nullable();

            // Disease name
            $table->string('name');

            // Description
            $table->text('description')->nullable();

            // Category
            $table->string('category')->nullable();

            // Chronic disease?
            $table->boolean('is_chronic')->default(false);

            // Active in the system?
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->index('name');
            $table->index('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diseases');
    }
};