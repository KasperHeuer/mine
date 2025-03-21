<?php

namespace Database\Seeders;

use App\Models\Posts as ModelsPosts;

use Illuminate\Database\Seeder;


class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsPosts::factory()->count(20)->create();
    }
}
