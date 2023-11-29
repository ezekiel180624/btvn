<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GiftCard;

class GiftCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Define the number of gift cards you want to create
         $numberOfGiftCards = 10;

         for ($i = 1; $i <= $numberOfGiftCards; $i++) {
             GiftCard::create([
                 'code' => 'GIFTCARD' . $i,
                 'amount' => rand(10, 100),
                 'expiration_date' => now()->addMonths(rand(1, 12)),
             ]);
         }
    }
}
