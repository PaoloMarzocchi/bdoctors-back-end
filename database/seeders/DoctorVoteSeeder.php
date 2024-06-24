<?php

namespace Database\Seeders;

use App\Models\DoctorProfile;
use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = DoctorProfile::all()->random(20);

        foreach ($doctors as $doc) {
            for ($i = 0; $i < 30; $i++) {
                $doc->votes()->attach(
                    Vote::inRandomOrder()->take(rand(1, 5))->pluck('id'),
                    [
                        'created_at' => date('Y-m-d')
                    ]
                );
            }
        }
    }
}
