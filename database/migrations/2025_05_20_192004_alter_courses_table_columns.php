<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn([
                'home_page', 'start_date', 'end_date', 'schedule_details', 'url_type', 'registration_url', 'registration_start_date', 'registration_end_date',
            ]);
            $table->renameColumn('front_image', 'page_image');
            $table->renameColumn('back_image', 'tile_image');
            $table->renameColumn('syllabus_url', 'syllabus');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->boolean('url_type')->default(0)->after('active');
            $table->string('schedule_details')->after('active');
            $table->date('end_date')->after('active');
            $table->date('start_date')->after('active');
            $table->boolean('home_page')->default(0)->after('active');
            $table->string('registration_url')->after('active')->nullable();
            $table->date('registration_start_date')->after('active')->nullable();
            $table->date('registration_end_date')->after('active')->nullable();

            $table->renameColumn('page_image', 'front_image');
            $table->renameColumn('tile_image', 'back_image');
            $table->renameColumn('syllabus', 'syllabus_url');
        });
    }
};
