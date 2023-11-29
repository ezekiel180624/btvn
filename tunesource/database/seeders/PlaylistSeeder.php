<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Playlist;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $playlists = [
            [
                'image'=> 'https://www.screengeek.net/wp-content/uploads/2023/09/blue-smurf-cat-meme.jpg',
                'title' => 'Rock Classics',
                'description' => 'A collection of timeless rock classics.',              
            ],
            [
                'image'=> 'https://www.screengeek.net/wp-content/uploads/2023/09/blue-smurf-cat-meme.jpg',
                'title' => 'Chill Out',
                'description' => 'Relax and unwind with these calming tunes.',
            ],
            [
                'image'=> 'https://www.screengeek.net/wp-content/uploads/2023/09/blue-smurf-cat-meme.jpg',
                'title' => 'KPOP',
                'description' => 'GEN Z',
            ],
            // Add more playlists as needed
        ];

        foreach ($playlists as $playlist) {
            Playlist::create($playlist);
        }
    }
}
