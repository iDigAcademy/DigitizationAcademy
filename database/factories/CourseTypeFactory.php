<?php

/*
 * Copyright (C) 2022 - 2025, Digitization Academy
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
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseType>
 */
class CourseTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['2-hour', '12-hour']),
        ];
    }

    /**
     * Create a 2-hour course type.
     *
     * @return static
     */
    public function twoHour()
    {
        return $this->state([
            'type' => '2-hour',
        ]);
    }

    /**
     * Create a 12-hour course type.
     *
     * @return static
     */
    public function twelveHour()
    {
        return $this->state([
            'type' => '12-hour',
        ]);
    }
}
