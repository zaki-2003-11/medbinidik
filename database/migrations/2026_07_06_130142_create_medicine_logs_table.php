<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medicine_logs', function (Blueprint $table) {

            $table->id();

            $table->foreignId('medicine_schedule_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->dateTime('scheduled_at');

            $table->dateTime('taken_at')->nullable();

            $table->enum('status',[
                'pending',
                'taken',
                'missed'
            ])->default('pending');

            $table->boolean('notification_sent')->default(false);

            $table->dateTime('notification_sent_at')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medicine_logs');
    }
};