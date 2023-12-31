<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" => "Ucup Surucup",
            "username" => "ucup",
            "email" => "ucup@gmail.com",
            "password" => "ucup"
        ]);

        User::factory(20)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Horror',
            'slug' => 'horror'
        ]);

        Category::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan'
        ]);

        Category::create([
            'name' => 'Perkampungan',
            'slug' => 'perkampungan'
        ]);

        Category::create([
            'name' => 'Anime',
            'slug' => 'anime'
        ]);

        Post::factory(120)->create();
    }
}
