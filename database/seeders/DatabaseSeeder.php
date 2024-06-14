<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DoctorProfile;
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
        $this->call([
            DoctorProfileSeeder::class,
            UserSeeder::class,
            SpecializationSeeder::class,
        ]);
    }
}
