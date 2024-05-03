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
        Schema::dropIfExists('idigbio_events');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('idigbio_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_id')->index()->nullable();
            $table->string('event_uid')->unique();
            $table->timestamps();
        });
    }
};
