<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prescriptions', function (Blueprint $table) {

            $table->id();

            $table->string('reference')->unique();

            $table->foreignId('consultation_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->dateTime('prescribed_at');

            $table->date('valid_until')->nullable();

            $table->unsignedTinyInteger('renewal_count')->default(0);

            $table->enum('status',[
                'active',
                'completed',
                'cancelled'
            ])->default('active');

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};