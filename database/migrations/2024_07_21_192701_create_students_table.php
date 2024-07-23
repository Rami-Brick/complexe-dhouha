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
            $table->string('name');
            $table->date('birth_date');
            $table->foreignId('course_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('gender', ['boy', 'girl']);
            $table->foreignId('relative_id')->nullable()->constrained()->nullOnDelete();
            $table->string('payment_status');
            $table->text('comments')->nullable();
            $table->string('event_participation');
            $table->string('leave_with');
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
