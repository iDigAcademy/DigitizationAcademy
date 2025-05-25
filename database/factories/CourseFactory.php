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

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start = fake()->dateTimeBetween('next Monday', 'next Monday +7 days')->format('Y-m-d');
        $end = fake()->dateTimeBetween($start, $start.' +7 days')->format('Y-m-d');

        return [
            'title' => $this->faker->words(rand(3, 5), true),
            'objectives' => $this->faker->text(810),
            'front_image' => $this->faker->image('public/storage/course_image', 468, 353, null, false),
            'back_image' => $this->faker->image('public/storage/course_image', 468, 100, null, false),
            'start_date' => $start,
            'end_date' => $end,
            'schedule_details' => $this->faker->text(150),
            'active' => true,
            'home_page' => false,
        ];
    }
}
