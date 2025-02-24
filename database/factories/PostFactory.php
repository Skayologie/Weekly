<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(1), // Use 'sentence' for realistic titles
            "post_content" => fake()->paragraphs(3, true), // Generates 3 paragraphs as a string
            "slug" => Str::slug(fake()->sentence(5), "_"), // Generate a slug
            "post_image" => "postImages/" . fake()->uuid() . ".jpg", // Unique image name
            "creator_id" => User::factory(), // Creates a user if not provided
            "status" => "pending" , // Creates a user if not provided
            "category_id" => Category::factory(), // Creates a category if needed
        ];
    }
}
