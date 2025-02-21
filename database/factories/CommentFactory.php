<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
//            $table->id();
//        $table->text("comment_content");
//        $table->unsignedBigInteger("user_id");
//        $table->foreign("user_id")->references("id")->on("users");
//        $table->unsignedBigInteger("post_id");
//        $table->foreign("post_id")->references("id")->on("posts");
//        $table->timestamps();
            "comment_content"=>fake()->text(50),
            "user_id"=>User::factory(),
            "post_id"=>Post::factory(),
        ];
    }
}
