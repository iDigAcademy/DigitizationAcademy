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
use Str;

class UpdateQueries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-queries {--events : Run only the events table migration} {--migrate-courses : Migrate data from courses to events} {--alter-courses : Run the alter courses table columns migration} {--update-slugs : Update slug column for existing courses} {--update-course-values : Update course values from CSV file} {--update-register-dates : Update form_start_date and form_end_date in Events table where they are null} {--create-assets : Run the create_assets_table and create_course_asset_table migrations} {--teams : Run teams table migration to drop columns}';

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
        if ($this->option('events')) {
            $this->runEventsTableMigration();
        } elseif ($this->option('migrate-courses')) {
            $this->migrateCourseDataToEvents();
        } elseif ($this->option('alter-courses')) {
            $this->runAlterCoursesTableColumnsMigration();
        } elseif ($this->option('update-course-values')) {
            $this->updateCourseValues();
        } elseif ($this->option('update-register-dates')) {
            $this->updateRegisterDates();
        } elseif ($this->option('create-assets')) {
            $this->runAssetsTablesMigrations();
        } elseif ($this->option('teams')) {
            $this->runTeamsTableMigration();
        } else {
            $this->info('No specific operation selected. Use --events to run the events table migration, --migrate-courses to migrate data from courses to events, --alter-courses to run the alter courses table columns migration, --update-slugs to update slug column for existing courses, --update-course-values to update course values from CSV file, --update-register-dates to update register dates in events table, or --create-assets to run the assets tables migrations.');
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

        $exitCode === 0 ?
            $this->info('Events table migration completed successfully.') :
            $this->error('Events table migration failed.');

    }

    /**
     * Migrate data from Courses table to Events table.
     *
     * 1. Group courses by title
     * 2. For each group, use the first course as the reference
     * 3. Migrate data from Courses to Events
     * 4. Delete duplicate courses
     */
    public function migrateCourseDataToEvents()
    {
        $this->info('Starting migration of course data to events...');

        // Group courses by title
        $courseGroups = Course::orderBy('created_at')
            ->get()->groupBy('title');
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

                // Process each course in the group
                foreach ($courses as $course) {
                    // Create a new event entry
                    Event::create([
                        'course_id' => $courseId,
                        'start_date' => $course->start_date,
                        'end_date' => $course->end_date,
                        'schedule' => $course->schedule_details,
                        'form_start_date' => $course->registration_start_date,
                        'form_end_date' => $course->registration_end_date,
                        'form_link' => $course->registration_url,
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
     * Run the alter courses table columns migration.
     */
    public function runAlterCoursesTableColumnsMigration()
    {
        $this->info('Running alter courses table columns migration...');

        $migrationPath = 'database/migrations/2025_05_18_184453_drop_columns_from_courses_table.php';

        $exitCode = Artisan::call('migrate', [
            '--path' => $migrationPath,
            '--force' => true,
        ]);

        if ($exitCode === 0) {
            $this->info('Drop columns from courses table completed successfully.');
        } else {
            $this->error('Drop columns from courses table columns migration failed.');
        }

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

        $courses = Course::all();
        $courses->each(function ($course) {
            $course->syllabus = $course->syllabus_url;
            $course->save();
        });

        $migrationPath = 'database/migrations/2025_05_21_184836_drop_syllabus_url_column_in_courses_table.php';

        $exitCode = Artisan::call('migrate', [
            '--path' => $migrationPath,
            '--force' => true,
        ]);

        if ($exitCode === 0) {
            $this->info('Drop syllabus_url from courses table columns migration completed successfully.');
        } else {
            $this->error('Drop syllabus_url from courses table columns migration failed.');
        }

        return $exitCode;
    }

    /**
     * Update course values from CSV file.
     *
     * This method reads a courses.csv file from the storage directory and updates
     * the following Course columns: slug, type, objectives, instructor, active,
     * sort_order, syllabus, and video. It uses the title to match the Course in
     * the database table.
     *
     * @return int
     */
    public function updateCourseValues()
    {
        $this->info('Starting update of course values from CSV...');

        // Define the path to the CSV file
        $csvPath = storage_path('courses.csv');

        // Check if the CSV file exists
        if (! file_exists($csvPath)) {
            $this->error("CSV file not found at: {$csvPath}");

            return 1;
        }

        // Begin transaction
        DB::beginTransaction();

        try {
            // Open the CSV file
            $handle = fopen($csvPath, 'r');
            if ($handle === false) {
                throw new \Exception("Unable to open CSV file: {$csvPath}");
            }

            // Read the header row to get column names
            $headers = fgetcsv($handle);
            if ($headers === false) {
                throw new \Exception('CSV file is empty or malformed');
            }

            // Convert headers to lowercase for case-insensitive matching
            $headers = array_map('strtolower', $headers);

            // Find the index of required columns
            $titleIndex = array_search('title', $headers);
            $slugIndex = array_search('slug', $headers);
            $typeIndex = array_search('type', $headers);
            $objectivesIndex = array_search('objectives', $headers);
            $instructorIndex = array_search('instructor', $headers);
            $activeIndex = array_search('active', $headers);
            $sortOrderIndex = array_search('sort_order', $headers);
            $syllabusIndex = array_search('syllabus', $headers);
            $videoIndex = array_search('video', $headers);

            // Check if title column exists (required for matching)
            if ($titleIndex === false) {
                throw new \Exception("CSV file must contain a 'title' column");
            }

            $updatedCount = 0;
            $rowCount = 0;

            // Process each row in the CSV
            while (($row = fgetcsv($handle)) !== false) {
                $rowCount++;

                // Get the title from the current row
                $title = $row[$titleIndex];

                // Find the course by title
                $course = Course::where('title', $title)->first();

                if (! $course) {
                    $this->warn("Course with title '{$title}' not found. Skipping row {$rowCount}.");

                    continue;
                }

                $this->info("Updating course: {$title} (ID: {$course->id})");

                // Update course fields if they exist in the CSV
                if ($slugIndex !== false && isset($row[$slugIndex]) && ! empty($row[$slugIndex])) {
                    $course->slug = $row[$slugIndex];
                }

                if ($typeIndex !== false && isset($row[$typeIndex])) {
                    $course->type = $row[$typeIndex];
                }

                if ($objectivesIndex !== false && isset($row[$objectivesIndex])) {
                    $course->objectives = $row[$objectivesIndex];
                }

                if ($instructorIndex !== false && isset($row[$instructorIndex])) {
                    $course->instructor = $row[$instructorIndex];
                }

                if ($activeIndex !== false && isset($row[$activeIndex])) {
                    // Convert various representations of boolean values
                    $activeValue = strtolower($row[$activeIndex]);
                    $course->active = in_array($activeValue, ['1', 'true', 'yes', 'y']) ? 1 : 0;
                }

                if ($sortOrderIndex !== false && isset($row[$sortOrderIndex])) {
                    $course->sort_order = (int) $row[$sortOrderIndex];
                }

                if ($syllabusIndex !== false && isset($row[$syllabusIndex])) {
                    $course->syllabus = $row[$syllabusIndex];
                }

                if ($videoIndex !== false && isset($row[$videoIndex])) {
                    $course->video = $row[$videoIndex];
                }

                // Save the updated course
                $course->save();
                $updatedCount++;
            }

            // Close the CSV file
            fclose($handle);

            // Commit the transaction
            DB::commit();

            $this->info("Course values update completed successfully. Updated {$updatedCount} courses out of {$rowCount} rows.");

            return 0;

        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            $this->error('Course values update failed: '.$e->getMessage());

            return 1;
        }
    }

    /**
     * Update slug column for existing courses.
     *
     * This method retrieves all existing courses and updates their slug column
     * based on their title using Str::slug().
     *
     * @return int
     */
    public function updateCourseSlugs()
    {
        $this->info('Starting update of course slugs...');

        // Begin transaction
        DB::beginTransaction();

        try {
            // Get all courses
            $courses = Course::all();
            $updatedCount = 0;

            $this->info('Found '.$courses->count().' courses to update.');

            foreach ($courses as $course) {
                // Generate slug from title
                $slug = Str::slug($course->title);

                // Update the course with the new slug
                $course->slug = $slug;
                $course->save();

                $updatedCount++;

                $this->info("Updated course: {$course->title} (ID: {$course->id}) with slug: {$slug}");
            }

            DB::commit();
            $this->info("Slug update completed successfully. Updated {$updatedCount} courses.");

            return 0;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Slug update failed: '.$e->getMessage());

            return 1;
        }
    }

    /**
     * Update form_start_date and form_end_date in Events table where they are null.
     *
     * For type = '2 Hour': form_start_date = 8 weeks before start_date
     * For type = '12 Hour': form_start_date = 6 weeks before start_date
     * For all courses: form_end_date = 2 weeks before start_date
     *
     * @return int
     */
    public function updateRegisterDates()
    {
        $this->info('Starting update of register dates in events...');

        // Begin transaction
        DB::beginTransaction();

        try {
            // Get events where form_start_date or form_end_date is null
            $events = Event::whereNull('form_start_date')
                ->orWhereNull('form_end_date')
                ->get();

            $updatedCount = 0;

            $this->info('Found '.$events->count().' events to update.');

            foreach ($events as $event) {
                $updated = false;

                // Update form_start_date based on type
                if ($event->form_start_date === null && $event->start_date !== null) {
                    $event->form_start_date = $event->start_date->copy()->subWeeks(6);
                    $updated = true;
                    $this->info("Updated form_start_date for event ID: {$event->id} to 6 weeks before start_date: {$event->form_start_date->format('Y-m-d')}");
                }

                // Update form_end_date (2 weeks before start_date for all courses)
                if ($event->form_end_date === null && $event->start_date !== null) {
                    $event->form_end_date = $event->start_date->copy()->subWeeks(2);
                    $updated = true;
                    $this->info("Updated form_end_date for event ID: {$event->id} to 2 weeks before start_date: {$event->form_end_date->format('Y-m-d')}");
                }

                // Save the event if any updates were made
                if ($updated) {
                    $event->save();
                    $updatedCount++;
                }
            }

            DB::commit();
            $this->info("Register dates update completed successfully. Updated {$updatedCount} events.");

            return 0;
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Register dates update failed: '.$e->getMessage());

            return 1;
        }
    }

    /**
     * Run the create_resources_table and create_course_resource_table migrations.
     *
     * @return int
     */
    public function runAssetsTablesMigrations()
    {
        $this->info('Running resources tables migrations...');

        // Define the migration paths
        $resourcesTableMigration = 'database/migrations/2025_05_28_191330_create_assets_table.php';
        $courseResourceTableMigration = 'database/migrations/2025_05_28_191953_create_asset_course_table.php';

        // Run the create_resources_table migration
        $this->info('Running create_assets_table migration...');
        $exitCode1 = Artisan::call('migrate', [
            '--path' => $resourcesTableMigration,
            '--force' => true,
        ]);

        if ($exitCode1 === 0) {
            $this->info('Assets table migration completed successfully.');
        } else {
            $this->error('Assets table migration failed.');

            return 1;
        }

        // Run the create_course_resource_table migration
        $this->info('Running create_course_asset_table migration...');
        $exitCode2 = Artisan::call('migrate', [
            '--path' => $courseResourceTableMigration,
            '--force' => true,
        ]);

        if ($exitCode2 === 0) {
            $this->info('Course asset table migration completed successfully.');
        } else {
            $this->error('Course asset table migration failed.');

            return 1;
        }

        $this->info('All assets tables migrations completed successfully.');

        return 0;
    }

    public function runTeamsTableMigration()
    {
        $this->info('Running teams table migration...');

        $migrationPath = 'database/migrations/2025_06_07_194520_remove_twitter_handle_from_teams_table.php';

        $exitCode = Artisan::call('migrate', [
            '--path' => $migrationPath,
            '--force' => true,
        ]);

        $exitCode === 0 ?
            $this->info('Teams table migration completed successfully.') :
            $this->error('Teams table migration failed.');

    }
}
