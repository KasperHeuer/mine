<?php

namespace Database\Seeders;

use App\Models\Comments;
use App\Models\Posts;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::factory(10)->create(); // Creates 10 users
        Posts::factory(15)->create(); // Creates 10 posts
        Comments::factory(100)->create(); // Creates 20 comments
    }
}
