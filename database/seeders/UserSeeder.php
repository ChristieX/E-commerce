<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         User::create([
            'name' => 'John Customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'), 
            'phone_no' => '1234567890',
            'role' => 'customer',
        ]);


        User::create([
            'name' => 'Sarah Seller',
            'email' => 'seller@example.com',
            'password' => Hash::make('password'),
            'phone_no' => '0987654321',
            'role' => 'seller',
        ]);
    }
}
