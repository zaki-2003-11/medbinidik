<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prescription_medicines', function (Blueprint $table) {

            $table->id();

            $table->foreignId('prescription_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('medicine_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('dosage'); // 500 mg

            $table->decimal('quantity_per_take',5,2);

            $table->enum('unit',[
                'tablet',
                'capsule',
                'ml',
                'drop',
                'spoon',
                'injection',
                'other'
            ]);

            $table->boolean('before_meal')->default(false);

            $table->boolean('after_meal')->default(true);

            $table->text('instructions')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prescription_medicines');
    }
};