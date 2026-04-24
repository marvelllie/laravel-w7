<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('password123'),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('password123'),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('user_roles')->insert([
            ['user_id' => 1, 'role' => 'customer', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'role' => 'customer', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'role' => 'admin', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}