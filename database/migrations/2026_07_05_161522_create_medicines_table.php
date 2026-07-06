<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->enum('dosage_form',[
                'tablet',
                'capsule',
                'syrup',
                'drops',
                'cream',
                'spray',
                'injection',
                'other'
            ]);

            $table->string('strength');

            $table->string('manufacturer')->nullable();

            $table->text('description')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};