<?php

namespace Database\Seeders;

use App\Models\DoctorProfile;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Europe/Rome');
        $now = date('Y-m-d H:i:s');
        $randomHour = fake()->randomElement([24, 72, 144]);

        $doctors = DoctorProfile::all()->random(6);

        foreach ($doctors as $doc) {
            $doc->sponsorships()->attach(
                Sponsorship::inRandomOrder()->take(rand(1, 3))->pluck('id'),
                [
                    'expirationDate' => fake()->dateTimeBetween($now, '+' . $randomHour . ' hours'),
                    'created_at' => $now
                ]
            );
        }
    }
}
