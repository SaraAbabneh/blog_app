<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminSetting;

class AdminSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminSetting::create([
            'admin_id' => 1, // Make sure this admin exists in the admins table
            'phone' => '123456789',
            'gender' => 'male',
            'photo' => 'uploads/admins/admin1.jpg',
            'address' => '123 Admin Street, Admin City',
        ]);

      
    }
}
