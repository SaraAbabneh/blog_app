<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserSetting;


class UserSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserSetting::create([
            'user_id' => 1, // Make sure this admin exists in the admins table
            'phone' => '0784578943',
            'gender' => 'male',
            'photo' => 'uploads/admins/admin1.jpg',
            'address' => '123 Admin Street, Admin City',
        ]);

      
    }
}

