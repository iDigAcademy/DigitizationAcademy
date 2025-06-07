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

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start_date = fake()->dateTimeBetween('next Monday', 'next Monday +30 days')->format('Y-m-d');
        $end_date = fake()->dateTimeBetween($start_date, $start_date.' +14 days')->format('Y-m-d');

        $form_start_date = fake()->dateTimeBetween('-30 days', 'now')->format('Y-m-d');
        $form_end_date = fake()->dateTimeBetween('now', $start_date)->format('Y-m-d');

        return [
            'course_id' => Course::factory(),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'schedule' => $this->faker->randomElement(['Mon-Wed-Fri 10:00-12:00', 'Tue-Thu 14:00-16:00', 'Weekends 9:00-13:00']),
            'form_start_date' => $form_start_date,
            'form_end_date' => $form_end_date,
            'form_link' => $this->faker->url(),
        ];
    }
}
