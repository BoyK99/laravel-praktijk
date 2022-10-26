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
    public function run() {
        // PW is Admin123
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$3LjfaEAo/HZ/sirSX9WSH.olRrUdj2FT3/PE.Gq8kU6nM9XFuEIsS',
        ]);

        // PW is 12345678
        $user1 = User::create([
            'name' => 'Boy',
            'email' => 'dieren1234@hotmail.com',
            'password' => '$2y$10$YdZXJsb94w5AGYOn9Vlaue7ACdaRRESN/zjshmurtCi92/zDbFq7y',
        ]);


    }
}
