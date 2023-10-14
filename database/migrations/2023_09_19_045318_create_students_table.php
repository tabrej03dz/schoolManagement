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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('roll_number');
            $table->string('image');
            $table->string('name');
            $table->string('gender');
            $table->foreignId('section_id')->constrained('sections');
            $table->string('parents');
            $table->foreignId('address_id')->constrained('student_addresses');
            $table->date('date_of_birth');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
