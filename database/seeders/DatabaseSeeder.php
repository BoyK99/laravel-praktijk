<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Playlist;
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
        User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$3LjfaEAo/HZ/sirSX9WSH.olRrUdj2FT3/PE.Gq8kU6nM9XFuEIsS',
            'is_active' => 1,
            'is_admin' => 1,

        ]);

        // PW is 12345678
        User::create([
            'id' => 2,
            'name' => 'Boy',
            'email' => 'dieren1234@hotmail.com',
            'password' => '$2y$10$YdZXJsb94w5AGYOn9Vlaue7ACdaRRESN/zjshmurtCi92/zDbFq7y',
            'is_active' => 1,
            'is_admin' => 0
            ]);

//        Playlist::create([
//            'id' => 1,
//            'name' => 'Test1',
//            'image' => '',
//            'description' => 'Test1 --- ja',
//            'active' => 1,
//            'user_id' => 1,
//            'category_id' => 2
////            'timestamps' => date("Y-m-d H:i:s")
//        ]);
//
//        Playlist::create([
//            'id' => 2,
//            'name' => 'Test2',
//            'image' => '',
//            'description' => 'Test2 --- ja',
//            'active' => 1,
//            'user_id' => 2,
//            'category_id' => 2
////            'timestamps' => date("Y-m-d H:i:s")
//        ]);
//
//        Comment::create([
//            'id' => 1,
//            'content' => 'Hallo dit is een test comment',
//            'timestamps' => date("Y-m-d H:i:s"),
//            'user_id' => 1,
//            'playlist_id' => 1
//        ]);
//
//        Comment::create([
//            'id' => 2,
//            'content' => 'Hallo dit is een test comment',
//            'timestamps' => date("Y-m-d H:i:s"),
//            'user_id' => 2,
//            'playlist_id' => 1
//        ]);
//
//        Comment::create([
//            'id' => 3,
//            'content' => 'Hallo dit is een test comment',
//            'timestamps' => date("Y-m-d H:i:s"),
//            'user_id' => 1,
//            'playlist_id' => 2
//        ]);
//
//        Comment::create([
//            'id' => 4,
//            'content' => 'Hallo dit is een test comment',
//            'timestamps' => date("Y-m-d H:i:s"),
//            'user_id' => 2,
//            'playlist_id' => 2
//        ]);
//
        Category::create([
            'id' => 1,
            'name' => 'pop'
        ]);

        Category::create([
            'id' => 2,
            'name' => 'hip-hop'
        ]);
    }
}
