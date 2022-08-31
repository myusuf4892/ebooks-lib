<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '0898989898',
            'password' => Hash::make('admin123'),
            'status' => 'active',
            'role_id' => 1
        ]);
        User::create([
            'name' => 'Agus Salim',
            'email' => 'donatur@gmail.com',
            'phone' => '0898939339',
            'password' => Hash::make('donatur123'),
            'status' => 'active',
            'role_id' => 2
        ]);
        User::create([
            'name' => 'Ambar',
            'email' => 'member1@gmail.com',
            'phone' => '0888889292',
            'password' => Hash::make('member123'),
            'status' => 'active',
            'role_id' => 3
        ]);
        User::create([
            'name' => 'Bonita',
            'email' => 'member2@gmail.com',
            'phone' => '0899991010',
            'password' => Hash::make('member234'),
            'status' => 'active',
            'role_id' => 3
        ]);
    }
}
