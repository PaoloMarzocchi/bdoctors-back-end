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
        for ($i = 0; $i < 200; $i++) {
            $review = new Review();

            $review->doctor_profile_id = $faker->numberBetween(1, 20);
            $review->first_name = $faker->firstName();
            $review->last_name = $faker->lastName();
            $review->email = $faker->email();
            $review->review_text = $faker->text();

            // Generate a random faker date
            $randomDateTime = $faker->dateTimeBetween('-1 year', 'now');

            // Format the date in "YYYY-MM-DD hh:mm:ss"
            $formattedDateTime = $randomDateTime->format('Y-m-d H:i:s');

            // Set created_at and updated_at 
            $review->created_at = $formattedDateTime;
            $review->updated_at = $formattedDateTime;

            $review->save();
        }
    }
}
