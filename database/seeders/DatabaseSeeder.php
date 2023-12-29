<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Noel',
            "url_name"=>'Noel',
            'email' => 'noel@gmail.com',
            'password'=> Hash::make('noelkhant'),
            'role'=>"admin"

        ]);

        $this->call([
            ArticleSeeder::class,
            CategorySeeder::class,
            CommentSeeder::class,
        ]);



    }
}
