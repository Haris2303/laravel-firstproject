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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Ucup Surucup',
            'email' => 'ucup@gmail.com',
            'password' => bcrypt('ucup')
        ]);

        User::create([
            'name' => 'Otong Surotong',
            'email' => 'otong@gmail.com',
            'password' => bcrypt('otong')
        ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Komedi Papua',
            'slug' => 'komedi-papua'
        ]);

        Post::create([
            'title' => 'Judul Pertama',
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nihil!',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis voluptate ullam adipisci ad molestiae corrupti voluptatem eaque placeat. Provident, nemo. Modi tenetur quo explicabo consequuntur. Sed architecto cumque omnis nam? Ipsa sequi cumque iure voluptas, quam repudiandae officia, ipsam provident enim cupiditate impedit alias dignissimos similique id architecto eaque cum fuga facere voluptatibus deleniti? Quo eveniet ex maxime sapiente vitae placeat atque, adipisci expedita debitis quia a enim? Unde sapiente nihil incidunt fugiat vitae a exercitationem, similique quos eius! Quod mollitia molestiae, ad molestias, fugit, provident nisi vitae obcaecati omnis dolor necessitatibus tenetur. Fugit, expedita animi soluta corrupti molestias aut?',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul Kedua',
            'slug' => 'judul-kedua',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nihil!',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis voluptate ullam adipisci ad molestiae corrupti voluptatem eaque placeat. Provident, nemo. Modi tenetur quo explicabo consequuntur. Sed architecto cumque omnis nam? Ipsa sequi cumque iure voluptas, quam repudiandae officia, ipsam provident enim cupiditate impedit alias dignissimos similique id architecto eaque cum fuga facere voluptatibus deleniti? Quo eveniet ex maxime sapiente vitae placeat atque, adipisci expedita debitis quia a enim? Unde sapiente nihil incidunt fugiat vitae a exercitationem, similique quos eius! Quod mollitia molestiae, ad molestias, fugit, provident nisi vitae obcaecati omnis dolor necessitatibus tenetur. Fugit, expedita animi soluta corrupti molestias aut?',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul ketiga',
            'slug' => 'judul-ketiga',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nihil!',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis voluptate ullam adipisci ad molestiae corrupti voluptatem eaque placeat. Provident, nemo. Modi tenetur quo explicabo consequuntur. Sed architecto cumque omnis nam? Ipsa sequi cumque iure voluptas, quam repudiandae officia, ipsam provident enim cupiditate impedit alias dignissimos similique id architecto eaque cum fuga facere voluptatibus deleniti? Quo eveniet ex maxime sapiente vitae placeat atque, adipisci expedita debitis quia a enim? Unde sapiente nihil incidunt fugiat vitae a exercitationem, similique quos eius! Quod mollitia molestiae, ad molestias, fugit, provident nisi vitae obcaecati omnis dolor necessitatibus tenetur. Fugit, expedita animi soluta corrupti molestias aut?',
            'category_id' => 2,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul Keempat',
            'slug' => 'judul-keempat',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, nihil!',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis voluptate ullam adipisci ad molestiae corrupti voluptatem eaque placeat. Provident, nemo. Modi tenetur quo explicabo consequuntur. Sed architecto cumque omnis nam? Ipsa sequi cumque iure voluptas, quam repudiandae officia, ipsam provident enim cupiditate impedit alias dignissimos similique id architecto eaque cum fuga facere voluptatibus deleniti? Quo eveniet ex maxime sapiente vitae placeat atque, adipisci expedita debitis quia a enim? Unde sapiente nihil incidunt fugiat vitae a exercitationem, similique quos eius! Quod mollitia molestiae, ad molestias, fugit, provident nisi vitae obcaecati omnis dolor necessitatibus tenetur. Fugit, expedita animi soluta corrupti molestias aut?',
            'category_id' => 2,
            'user_id' => 2
        ]);
    }
}
