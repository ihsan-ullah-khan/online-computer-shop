<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'phone' => '12345',
            'address' => 'Thana bypass',
            'password' => bcrypt('admin'),
            'user_type' => User::ADMIN,
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'phone' => '12345678',
            'address' => 'Thana bypass',
            'password' => bcrypt('user'),
        ]);
    }
}
