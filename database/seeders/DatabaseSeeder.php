<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  User::factory(2)->create();
        //  Blog::factory(20)->create();
        //  Comment::factory(20)->create();
        User::create(
            [
                'name' => 'user1',
                'username' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('123456789'), // password
                'level' => 'admin'
            ]
        );
        User::create(
            [
                'name' => 'user2',
                'username' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('123456789'), // password
                'level' => 'admin'
            ]
        );
         
        
    }
}
