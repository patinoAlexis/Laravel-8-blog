<?php

namespace Database\Factories;
use App\Models\Category;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(),
            'category_id' => Category::factory()->create(),
            'title' => $this->faker->unique()->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'excerpt' => implode($this->faker->paragraphs(2)),
            'body' => implode($this->faker->paragraphs(6))
            // 'body' => $this->faker->paragraph()
        ];
    }
}
