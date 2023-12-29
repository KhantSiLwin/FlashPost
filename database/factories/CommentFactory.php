<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Comment;
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
            "content"=> fake()->text($maxNbChars = 40,),
            "user_id" => User::all()->random()->id,
            "article_id"=>Article::all()->random()->id,
            "parent_id"=>null,
          
          
            // "user_id"=>User::all()->random()->id,
        ];
    }
}
