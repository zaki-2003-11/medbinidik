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
        Schema::create('patients', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('phone',20);

            $table->enum('gender',[
                'male',
                'female'
            ]);

            $table->date('date_of_birth');

            $table->enum('blood_group',[
                'A+',
                'A-',
                'B+',
                'B-',
                'AB+',
                'AB-',
                'O+',
                'O-'
            ])->nullable();

            $table->decimal('height',5,2)->nullable()->comment('Height in centimeters');

            $table->decimal('weight',5,2)->nullable()->comment('Weight in kilograms');

            $table->text('allergies')->nullable();

            $table->string('emergency_contact_name')->nullable();

            $table->string('emergency_contact_phone',20)->nullable();

            $table->string('guardian_name')->nullable();

            $table->string('guardian_phone',20)->nullable();

            $table->string('relationship_to_guardian')->nullable();

            $table->timestamps();

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};