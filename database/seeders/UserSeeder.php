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
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'usertype' => '1',
            'password' => Hash::make('admin'),
            
        ]);

        User::create([
            'name' => 'Sangam',
            'email' => 'katwalsangam@gmail.com',
            'usertype' => '0',
            'phone' => '9864998311',
            'address' => 'Gothatar',
            'password' => Hash::make('admin'),
        ]);
    }
}