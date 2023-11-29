<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $songs = [
            [
                'title' => 'Song 1',
                'thumb' => 'song1.jpg',
                'link' => 'song1.mp3',
                'artist' => 'Artist 1',
                'category' => 'Category 1',
                'duration' => '00:03:45',
            ],
            [
                'title' => 'Song 2',
                'thumb' => 'song2.jpg',
                'link' => 'song2.mp3',
                'artist' => 'Artist 2',
                'category' => 'Category 2',
                'duration' => '00:04:20',
            ],
            // Add more songs as needed
        ];

        // Insert songs into the database
        foreach ($songs as $song) {
            Song::create($song);
        }
    }
}
