<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PageImage>
 */
class PageImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * 855x855 pages
     * 800x800 home upper
     * 575x280 hoem lower
     * @return array<string, mixed>
     */
    public function definition()
    {
        $page = $this->faker->randomElement(['about', 'calendar', 'courses', 'home']);
        if ($page === 'home') {
            $position = $this->faker->randomElements([0, 1]);
            $image = $position == 0 ?
                $this->faker->image('public/storage/page_image', 800, 800, null, false) :
                $this->faker->image('public/storage/page_image', 575, 280, null, false);
        } else {
            $position = 0;
            $image = $this->faker->image('public/storage/page_image', 855, 855, null, false);
        }

        return [
            'page' => $page,
            'position' => $position,
            'image' => $image,
            'active' => $this->faker->randomElements([0, 1])
        ];
    }
}
