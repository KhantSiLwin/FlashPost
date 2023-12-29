<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $categories = ["Local News","World News","Sports","Foods","travel"];
        $arr =[];
        foreach($categories as $category){
            $arr[]=[
                "title"=> $category,
                "slug"=> Str::slug($category),
                // "user_id"=> rand(1,11),
                'user_id'=>User::where("role","admin")->get()->random()->id,
                "updated_at"=>now(),
                "created_at"=>now(),
            ];
           
        }
         Category::insert($arr);
    }
}
