<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; // Import Seeder class
use App\Models\Reply;

class RepliesSeeder extends Seeder
{
    public function run()
    {
        Reply::factory(20)->create(); // Creates 20 replies
    }
}
