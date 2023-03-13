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

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory(1)->create([
            'title' => 'Introduction to Biodiversity Specimen Digitization',
            'objectives' => 'The aims of the course are to empower participants with the knowledge and skills to (1) identify and describe relevant facets of information or potential information related to biodiversity specimens, (2) identify and describe common digitization protocols and best practices related to transcription, imaging, and georeferencing, (3) identify downstream uses that are relevant to digitization decision-making, (4) recognize basic principles of data management including the importance of identifiers, (5) identify collections management system (CMS) options and the major differences among them, and (6) outline a digitization project, including quality control and a data management plan that includes data sharing. The course includes a conversation with representatives from the major CMS projects.',
            'front_image' => 'course_image/project-4-front.png',
            'front_image_name' => 'project-4-front.png',
            'front_image_size' => '331355',
            'back_image' => 'course_image/project-4-back.png',
            'back_image_name' => 'project-4-back.png',
            'back_image_size' => '331355',
            'schedule_details' => 'This will contain details about the course days, date and times. The text must be limited to a certain amount or card will display in an ugly manner.',
            'home_page' => true,
        ]);

        Course::factory(8)->create();
    }
}
