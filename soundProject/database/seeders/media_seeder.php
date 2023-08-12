<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class media_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Media::create([
            'mediaName' => 'Song 1',
            'mediaTypeId' => 1, // Replace with the actual ID from the media_types table
            'mediaPhoto' => 'https://media.istockphoto.com/id/485428055/photo/side-view-studio-shot-of-white-mini-car.jpg?s=612x612&w=0&k=20&c=UwEMhW40q-euIRu-ItKmL12fskWHhs8VlT8ABxmhzZc=',
            'mediaURL' => 'https://example.com/song1.mp3',
            'extension' => 'mp3',
        ]);

        Media::create([
            'mediaName' => 'Song 2',
            'mediaTypeId' => 1, // Replace with the actual ID from the media_types table
            'mediaPhoto' => 'https://media.wired.com/photos/59a73afaf9fe190b712e063b/master/w_2560%2Cc_limit/Daimler-Smart-Car--TA.jpg',
            'mediaURL' => 'https://example.com/song2.mp3',
            'extension' => 'mp3',
        ]);

    }
}
