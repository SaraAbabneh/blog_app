<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('Admin@123'),
            'added_by' => null,
            'created_at' => now(), 
            'updated_at' => now(), 
        ]);
    }
}
