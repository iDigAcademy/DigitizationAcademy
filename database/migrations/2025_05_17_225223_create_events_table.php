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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('schedule');
            $table->enum('course_type', ['2 Hour', '12 Hour'])->default('2 Hour');
            $table->date('register_start_date')->nullable();
            $table->date('register_end_date')->nullable();
            $table->string('register_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
