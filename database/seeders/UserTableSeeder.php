<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       

        DB::table('users')->insert([
             //Admin
            [
                'name' => 'Asadur Rahman',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'status' => 'active',
            ],
             //Manager
            [
                'name' => 'Manager',
                'username' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'manager',
                'status' => 'active',
            ],
             //Member
            [
                'name' => 'Member',
                'username' => 'member',
                'email' => 'member@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'member',
                'status' => 'active',
            ]
        ]);
    }
}
