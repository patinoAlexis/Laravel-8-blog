<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Comment::truncate();
        // Post::truncate();
        // User::truncate();
        // Category::truncate();
        
        // $user = User::factory(5)->create();
        Post::factory(10)->create();
        Comment::factory(4)->create();
       
    }
}
