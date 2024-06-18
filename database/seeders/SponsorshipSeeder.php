<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorships =
            [
                [
                    'name' => 'One day sponsor',
                    'description' => '',
                    'period' => 24,
                    'price' => 2.99,
                ],
                [
                    'name' => 'Three days sponsor',
                    'description' => '',
                    'period' => 72,
                    'price' => 5.99,
                ],
                [
                    'name' => 'Six days sponsor',
                    'description' => '',
                    'period' => 144,
                    'price' => 9.99,
                ],
            ];

        foreach ($sponsorships as $sponsorship) {
            $newSponsor = new Sponsorship();
            $newSponsor->name = $sponsorship['name'];
            $newSponsor->description = $sponsorship['description'];
            $newSponsor->period = $sponsorship['period'];
            $newSponsor->price = $sponsorship['price'];
            $newSponsor->slug = Str::slug($sponsorship['name'], '-');
            $newSponsor->save();
        }
    }
}
