<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsSeeder extends Seeder
{
    public function run()
    {
        // Create comments with associated posts and users
        Comment::factory(50)->create();
    }
}
