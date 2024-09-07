<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsSeeder extends Seeder
{
    public function run()
    {
        // Create posts with associated users
        Post::factory(10)->create();
    }
}
