<?php

namespace Database\Seeders;

use App\Models\DoctorProfile;
use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DoctorVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $doctors = DoctorProfile::all()->random(20);

        foreach ($doctors as $doc) {
            for ($i = 0; $i < 30; $i++) {
                $randomDateTime = $faker->dateTimeBetween('-1 year', 'now');
                $formattedDateTime = $randomDateTime->format('Y-m-d H:i:s');

                $doc->votes()->attach(
                    Vote::inRandomOrder()->take(rand(1, 5))->pluck('id'),
                    [
                        'created_at' => $formattedDateTime,
                        'updated_at' => $formattedDateTime,
                    ]
                );
            }
        }
    }
}
