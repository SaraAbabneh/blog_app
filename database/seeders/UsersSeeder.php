<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'UserTest',
            'username' => 'User@123',
            'email' => 'UserTest123@gmail.com',
            'password' => Hash::make('User@123'),
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
        // Creating 10 users with the User factory
        User::factory(10)->create();
    }
}

