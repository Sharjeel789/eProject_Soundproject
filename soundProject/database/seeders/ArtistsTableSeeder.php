<?php

namespace Database\Seeders;

use App\Models\Artists;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artists::create(['name' => 'John Doe']);
        Artists::create(['name' => 'Jane Smith']);
    }
}
