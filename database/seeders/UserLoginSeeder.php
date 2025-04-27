<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a user with the role 'user'
        DB::table('users_login')->insert([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);
    }
}
