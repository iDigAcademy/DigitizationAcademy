<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('objectives');
            $table->string('front_image')->nullable();
            $table->string('front_image_name')->nullable();
            $table->string('front_image_size')->nullable();
            $table->string('back_image')->nullable();
            $table->string('back_image_name')->nullable();
            $table->string('back_image_size')->nullable();
            $table->boolean('active')->default(0);
            $table->boolean('home_page')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('schedule_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
