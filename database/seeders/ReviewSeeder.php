<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 100; $i++) {
            $review = new Review();

            $review->doctor_profile_id = $faker->numberBetween(1, 20);
            $review->first_name = $faker->firstName();
            $review->last_name = $faker->lastName();
            $review->email = $faker->email();
            $review->review_text = $faker->text();
            $review->save();
        }
    }
}
