<?php

/*
 * Copyright (c) 2022. Digitization Academy
 * idigacademy@gmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class UpdateQueries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-queries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run database update queries and migrations';

    /**
     * Execute the console command.
     *
     * @throws \Throwable
     */
    public function handle()
    {
        $this->info('Starting database update queries...');

        // A) Insert course types into course_types table
        $this->info('Inserting course types...');
        DB::table('course_types')->insert([
            ['type' => '2-hour', 'created_at' => now(), 'updated_at' => now()],
            ['type' => '12-hour', 'created_at' => now(), 'updated_at' => now()],
        ]);
        $this->info('Course types inserted successfully.');

        // B) Update courses table course_type_id based on existing type values
        $this->info('Updating courses with course_type_id...');

        // Get course type IDs
        $twoHourTypeId = DB::table('course_types')->where('type', '2-hour')->first()->id;
        $twelveHourTypeId = DB::table('course_types')->where('type', '12-hour')->first()->id;

        // Update courses where type = '2 Hour' to use '2-hour' course type
        DB::table('courses')
            ->where('type', '2 Hour')
            ->update(['course_type_id' => $twoHourTypeId]);

        // Update courses where type = '12 Hour' to use '12-hour' course type
        DB::table('courses')
            ->where('type', '12 Hour')
            ->update(['course_type_id' => $twelveHourTypeId]);

        $this->info('Courses updated successfully.');

        // C) Drop the old 'type' column from courses table
        $this->info('Dropping old type column from courses table...');
        DB::statement('ALTER TABLE courses DROP COLUMN type');
        $this->info('Old type column dropped successfully.');

        // D) Change course_type_id column to NOT NULL
        $this->info('Setting course_type_id column to NOT NULL...');
        DB::statement('ALTER TABLE courses MODIFY COLUMN course_type_id BIGINT UNSIGNED NOT NULL');
        $this->info('course_type_id column set to NOT NULL successfully.');

        $this->info('Database update queries completed!');
    }
}
