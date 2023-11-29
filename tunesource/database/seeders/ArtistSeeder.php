<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artists=[ 
        [
            'image'=> 'https://www.screengeek.net/wp-content/uploads/2023/09/blue-smurf-cat-meme.jpg',
            'name' => 'Rock Classics',              
        ],
        [
            'image'=> 'https://www.screengeek.net/wp-content/uploads/2023/09/blue-smurf-cat-meme.jpg',
            'name' => 'Chill Out',
        ],
        [
            'image'=> 'https://www.screengeek.net/wp-content/uploads/2023/09/blue-smurf-cat-meme.jpg',
            'name' => 'KPOP',
        ],
        [
            'image'=> 'https://www.screengeek.net/wp-content/uploads/2023/09/blue-smurf-cat-meme.jpg',
            'name' => 'Rock Classics',              
        ],
        [
            'image'=> 'https://www.screengeek.net/wp-content/uploads/2023/09/blue-smurf-cat-meme.jpg',
            'name' => 'Chill Out',
        ],
        [
            'image'=> 'https://www.screengeek.net/wp-content/uploads/2023/09/blue-smurf-cat-meme.jpg',
            'name' => 'KPOP',
        ],
    ];
    foreach ($artists as $artist) {
        Artist::create($artist);
    }
    }
}
