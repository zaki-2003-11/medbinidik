<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('treatments', function (Blueprint $table) {

            $table->id();

            $table->string('reference')->unique();

            $table->foreignId('consultation_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');

            $table->text('description');

            $table->date('start_date');

            $table->date('end_date')->nullable();

            $table->enum('status',[
                'ongoing',
                'completed',
                'cancelled'
            ])->default('ongoing');

            $table->timestamps();

            $table->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};