<?php

namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Ahmed',
            'email' => 'ahmed@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Mohamed',
            'email' => 'mohamed@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
