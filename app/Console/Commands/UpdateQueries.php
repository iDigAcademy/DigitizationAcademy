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

use App\Models\Course;
use App\Models\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UpdateQueries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-queries {--events : Run only the events table migration} {--migrate-courses : Migrate data from courses to events} {--alter-courses : Run the alter courses table columns migration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run database update queries and migrations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->option('events')) {
            $this->runEventsTableMigration();
        } elseif ($this->option('migrate-courses')) {
            $this->migrateCourseDataToEvents();
        } elseif ($this->option('alter-courses')) {
            $this->runAlterCoursesTableColumnsMigration();
        } else {
            $this->info('No specific operation selected. Use --events to run the events table migration, --migrate-courses to migrate data from courses to events, or --alter-courses to run the alter courses table columns migration.');
        }
    }

    /**
     * Run only the events table migration.
     */
    public function runEventsTableMigration()
    {
        $this->info('Running events table migration...');

        $migrationPath = 'database/migrations/2025_05_17_225223_create_events_table.php';

        $exitCode = Artisan::call('migrate', [
            '--path' => $migrationPath,
            '--force' => true,
        ]);

        if ($exitCode === 0) {
            $this->info('Events table migration completed successfully.');
        } else {
            $this->error('Events table migration failed.');
        }

        return $exitCode;
    }

    /**
     * Run the alter courses table columns migration.
     */
    public function runAlterCoursesTableColumnsMigration()
    {
        $this->info('Running alter courses table columns migration...');

        $migrationPath = 'database/migrations/2025_05_20_192004_alter_courses_table_columns.php';

        $exitCode = Artisan::call('migrate', [
            '--path' => $migrationPath,
            '--force' => true,
        ]);

        if ($exitCode === 0) {
            $this->info('Alter courses table columns migration completed successfully.');
        } else {
            $this->error('Alter courses table columns migration failed.');
        }

        return $exitCode;
    }

    /**
     * Migrate data from Courses table to Events table.
     *
     * 1. Group courses by title
     * 2. For each group, use the first course as the reference
     * 3. Load course_type mapping from CSV file
     * 4. Migrate data from Courses to Events
     * 5. Delete duplicate courses
     */
    public function migrateCourseDataToEvents()
    {
        $this->info('Starting migration of course data to events...');

        // Load course_type mapping from CSV file
        $courseTypeMapping = $this->loadCourseTypeMapping();
        if (empty($courseTypeMapping)) {
            $this->error('Failed to load course type mapping from CSV file.');

            return 1;
        }

        // Group courses by title
        $courseGroups = Course::all()->groupBy('title');
        $this->info('Found '.$courseGroups->count().' unique course titles.');

        // Begin transaction
        DB::beginTransaction();

        try {
            $migratedCount = 0;
            $deletedCount = 0;

            foreach ($courseGroups as $title => $courses) {
                // Use the first course in each group as the reference
                $referenceCourse = $courses->first();
                $courseId = $referenceCourse->id;

                $this->info("Processing course: {$title} (ID: {$courseId})");

                // Determine course_type based on schedule_details
                $courseType = '2 Hour'; // Default value
                $scheduleDetails = $referenceCourse->schedule_details;

                if (isset($courseTypeMapping[$scheduleDetails])) {
                    $courseType = $courseTypeMapping[$scheduleDetails];
                } else {
                    $this->warn("No course type mapping found for schedule: {$scheduleDetails}. Using default: {$courseType}");
                }

                // Process each course in the group
                foreach ($courses as $course) {
                    // Create a new event entry
                    Event::create([
                        'course_id' => $courseId,
                        'start_date' => $course->start_date,
                        'end_date' => $course->end_date,
                        'schedule' => $course->schedule_details,
                        'course_type' => $courseType,
                        'register_start_date' => $course->registration_start_date,
                        'register_end_date' => $course->registration_end_date,
                        'register_link' => $course->registration_url,
                    ]);

                    $migratedCount++;

                    // Delete duplicate courses (all except the reference course)
                    if ($course->id !== $courseId) {
                        $course->delete();
                        $deletedCount++;
                    }
                }
            }

            DB::commit();
            $this->info("Migration completed successfully. Migrated {$migratedCount} courses to events and deleted {$deletedCount} duplicate courses.");

            return 0;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Migration failed: '.$e->getMessage());

            return 1;
        }
    }

    /**
     * Load course type mapping from CSV file.
     *
     * @return array
     */
    private function loadCourseTypeMapping()
    {
        $mapping = [];
        $csvPath = Storage::path('course_type.csv');

        if (! File::exists($csvPath)) {
            $this->error("CSV file not found: {$csvPath}");

            return $mapping;
        }

        $handle = fopen($csvPath, 'r');

        // Skip header row
        fgetcsv($handle);

        while (($data = fgetcsv($handle)) !== false) {
            if (count($data) >= 2) {
                $scheduleDetails = $data[0];
                $courseType = $data[1];
                $mapping[$scheduleDetails] = $courseType;
            }
        }

        fclose($handle);

        $this->info('Loaded '.count($mapping).' course type mappings from CSV.');

        return $mapping;
    }
}
