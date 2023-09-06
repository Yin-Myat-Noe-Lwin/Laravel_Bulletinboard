<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin1',
                'email' => 'admin1@gmail.com',
                'phone' => '09-123456789',
                'address' => 'Taunggyi',
                'role' => 'admin',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Admin2',
                'email' => 'admin2@gmail.com',
                'phone' => '09-000000000',
                'address' => 'Yangon',
                'role' => 'admin',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Admin3',
                'email' => 'admin3@gmail.com',
                'phone' => '09-333333333',
                'address' => 'Pathein',
                'role' => 'admin',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Admin4',
                'email' => 'admin4@gmail.com',
                'phone' => '09-444444444',
                'address' => 'Magway',
                'role' => 'admin',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Admin5',
                'email' => 'admin5@gmail.com',
                'phone' => '09-555555555',
                'address' => 'Yangon',
                'role' => 'admin',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Admin6',
                'email' => 'admin6@gmail.com',
                'phone' => '09-777777777',
                'address' => 'Yangon',
                'role' => 'admin',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'phone' => '09-224466880',
                'address' => 'Mandalay',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'phone' => '09-113355779',
                'address' => 'Sittwe',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User3',
                'email' => 'user3@gmail.com',
                'phone' => '09-111111111',
                'address' => 'Sagaing',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User4',
                'email' => 'user4@gmail.com',
                'phone' => '09-555555555',
                'address' => 'Sagaing',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User5',
                'email' => 'user5@gmail.com',
                'phone' => '09-666666666',
                'address' => 'Loikaw',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User6',
                'email' => 'user6@gmail.com',
                'phone' => '09-999999999',
                'address' => 'Myitkyina',
                'role' => 'user',
                'password' => bcrypt('password'),
            ],
        ]);
    }
}
