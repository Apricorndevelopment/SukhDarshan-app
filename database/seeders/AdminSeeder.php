<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'ayurvedaadmin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('admin123456789'),
                'role' => 'admin',
            ]
        );
    }
}
