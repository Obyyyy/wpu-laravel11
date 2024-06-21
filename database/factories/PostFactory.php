<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
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
    public function definition(): array
    {
        $title = fake()->sentence();
        // $category = fake()->randomElements(['Web Programming', 'Machine Learning', 'Cloud Computing']);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'author_id' => User::factory(),
            // 'category_id' => Category::factory(),
            // 'author_id' => fake()->numberBetween(1,3),
            'category_id' => fake()->numberBetween(1,5),
            'isi' => fake()->text(),
        ];
    }
}