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
        Schema::create('relatives', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('phone_father');
            $table->string('phone_mother');
            $table->string('email');
            $table->string('address');
            $table->string('job');
            $table->string('cin');
            $table->string('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
