<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'title' => $this->faker->jobTitle(),
            'email' => $this->faker->email(),
            'twitter_handle' => 'testmanager',
            'about' => $this->faker->realText(),
            'image' => $this->faker->image('public/storage/team_image/teamtest.png', 410, 410, null, false),
            'image_name' => 'teamtest.png',
            'image_size' => 234633,
            'order' => 99
        ];
    }
}
