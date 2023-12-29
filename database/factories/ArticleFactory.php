<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        $description= fake()->paragraph(50);
        return [
            "title"=>$title,
            "slug" => Str::slug($title),
            "description"=>fake()->paragraph(50),
            "except"=> Str::words($description,30,'...'),
            "category_id"=>rand(1,5),
            "user_id"=>rand(1,11),
            // "user_id"=>User::all()->random()->id,
        ];
    }
}
