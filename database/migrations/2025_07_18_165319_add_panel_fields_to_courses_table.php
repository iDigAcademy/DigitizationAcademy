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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('expert_panel_headline')->after('video');
            $table->string('expert_panel_copy')->after('expert_panel_headline');
            $table->string('expert_panel_image')->after('expert_panel_copy');
            $table->string('expert_panelist_copy')->after('expert_panel_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['expert_panel_headline', 'expert_panel_copy', 'expert_panel_image', 'expert_panelist_copy']);
        });
    }
};
