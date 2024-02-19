<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'name' => 'Ferry Aditya H',
            'email' => 'ferryaja@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'Internal',
            'url' => 'img/profile/1686011518209-WhatsApp-Image-2023-06-04-at-10.03.55-PM.jpeg',
            'no_telp' => '081224669182'
        ]);
    }
}
