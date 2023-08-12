<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(user_seeder::class);
        $this->call(ArtistsTableSeeder::class);
        $this->call(LyricistsTableSeeder::class);
        $this->call(MediaTypeSeeder::class);
        $this->call(media_seeder::class);

        //Run the following command to execute all the seeders:
        //php artisan migrate:refresh --seed
    }
}
