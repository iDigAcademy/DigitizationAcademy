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
            $table->string('syllabus_url')->after('schedule_details')->nullable();
            $table->date('registration_end_date')->after('schedule_details')->nullable();
            $table->date('registration_start_date')->after('schedule_details')->nullable();
            $table->string('registration_url')->after('schedule_details')->nullable();
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
            $table->dropColumn([
                'registration_url',
                'registration_start_date',
                'registration_end_date',
                'syllabus_url'
            ]);
        });
    }
};
