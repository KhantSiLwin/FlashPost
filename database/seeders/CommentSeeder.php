<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::factory(100)->create();

        $arr=[];
        for ($i=0; $i <30 ; $i++) { 
          
        $parent_id =  Comment::all()->random()->id;

        $arr[]=[
            "content"=> fake()->text($maxNbChars = 40,),
            "user_id" => User::all()->random()->id,
            "article_id"=>Article::all()->random()->id,
            "parent_id"=>$parent_id,
            "updated_at"=>now(),
            "created_at"=>now(),
        ];

        }

        Comment::insert($arr);
    }
}
