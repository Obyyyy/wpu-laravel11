<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(10)->create();
        // User::factory(3)->has(Post::factory()->count(5))->create();
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
        ]);
        Post::factory(25)->recycle([
            Category::all(),
            User::all(),
        ])->create();
    }
}