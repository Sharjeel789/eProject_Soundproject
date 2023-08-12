<?php

namespace Database\Seeders;

use App\Models\MediaType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert the 'audio' media type
        MediaType::create([
            'name' => 'audio',
        ]);

        // Insert the 'video' media type
        MediaType::create([
            'name' => 'video',
        ]);
    }
}
