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
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['front_image_name', 'front_image_size', 'back_image_name', 'back_image_size']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('front_image_size')->nullable()->after('front_image');
            $table->string('front_image_name')->nullable()->after('front_image');

            $table->string('back_image_size')->nullable()->after('back_image');
            $table->string('back_image_name')->nullable()->after('back_image');
        });
    }
};
