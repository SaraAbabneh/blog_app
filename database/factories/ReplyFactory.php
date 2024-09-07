<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Reply; // Import the Reply model
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    protected $model = Reply::class;

    public function definition()
    {
        return [
            'comment_id' => Comment::factory(),
            'user_id' => User::factory(),
            'reply' => $this->faker->sentence(),
        ];
    }
}
