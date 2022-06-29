<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
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
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
            'remember_token' => str()->random(10),
        ]);

        $kategori = [
            [
                'name' => 'Now Playing',
                'slug' => 'now-playing',
                'endpoint' => '/movie/now_playing',
            ],
            [
                'name' => 'Popular',
                'slug' => 'popular',
                'endpoint' => '/movie/popular',
            ],
            [
                'name' => 'Top Rated',
                'slug' => 'top-rated',
                'endpoint' => '/movie/top_rated',
            ],
            [
                'name' => 'Upcoming',
                'slug' => 'upcoming',
                'endpoint' => '/movie/upcoming',
            ],
        ];

        Category::insert($kategori);
    }
}
