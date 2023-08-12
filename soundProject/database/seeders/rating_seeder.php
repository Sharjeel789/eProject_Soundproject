<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class rating_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add some dummy data for ratings
        Rating::create([
            'media_id' => 1,
            'user_id' => 1,
            'rating' => 5,
        ]);

        Rating::create([
            'media_id' => 1,
            'user_id' => 1,
            'rating' => 5,
        ]);
    }
}
