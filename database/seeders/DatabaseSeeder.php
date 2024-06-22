<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DoctorProfile;
use App\Models\Specialization;
use Illuminate\Database\Seeder;
use League\CommonMark\Util\SpecReader;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        /* DoctorProfile::factory()->create();
        Specialization::factory()->create();

        $doctors = DoctorProfile::all();

        foreach ($doctors as $doc) {
            $doc->specializations()->attach(
                Specialization::inRandomOrder()->take(rand(1, 3))->pluck('id')
            );
        } */

        $this->call([
            UserSeeder::class,
            DoctorProfileSeeder::class,
            SpecializationSeeder::class,
            SponsorshipSeeder::class,
            DoctorSpecializationSeeder::class,
            DoctorSponsorshipSeeder::class,
            MessageSeeder::class,
            VoteSeeder::class,
            DoctorVoteSeeder::class,
            ReviewSeeder::class
        ]);
    }
}
