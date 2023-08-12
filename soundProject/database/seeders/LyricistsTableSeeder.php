<?php

namespace Database\Seeders;

use App\Models\Lyricists;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LyricistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lyricists::create(['name' => 'Alice Johnson']);
        Lyricists::create(['name' => 'Bob Williams']);
    }
}
