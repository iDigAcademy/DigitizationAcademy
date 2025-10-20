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
use Str;

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
        $title = $this->faker->words(rand(3, 5), true);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'type' => $this->faker->randomElement(['2 Hour', '12 Hour']),
            'description' => $this->faker->text(500),
            'objectives' => $this->faker->text(810),
            'language' => $this->faker->randomElement(['English', 'Spanish', 'French']),
            'instructor' => $this->faker->name(),
            'page_image' => $this->faker->image('public/storage/course_image', 468, 353, null, false),
            'tile_image' => $this->faker->image('public/storage/course_image', 468, 100, null, false),
            'syllabus' => $this->faker->url(),
            'video' => $this->faker->url(),
            'active' => true,
            'order' => $this->faker->numberBetween(0, 100),
        ];
    }
}
