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

        $reviewsText =
            [
                "The doctor was very kind and professional. He resolved my issue with great competence.",
                "Great experience! The doctor explained everything clearly and in detail.",
                "I am very satisfied with the visit. The doctor is very competent and available.",
                "Very prepared and attentive doctor. Highly recommended!",
                "Negative experience. The doctor was rude and inattentive.",
                "Excellent visit. The doctor was punctual and professional.",
                "Very happy with the visit. The doctor answered all my questions patiently.",
                "The doctor was very thorough and dedicated enough time to the visit.",
                "Exceptional doctor! I felt at ease immediately.",
                "Not satisfied. The doctor did not listen to my concerns.",
                "The doctor was very courteous and professional. I will definitely return.",
                "Great service! The doctor was very clear and precise in his explanations.",
                "Terrible experience. The doctor was late and inattentive.",
                "I am very happy with the visit. The doctor was very empathetic and competent.",
                "Very professional and prepared doctor. He helped me understand my problem.",
                "Quick but effective visit. The doctor was very direct and clear.",
                "I did not feel comfortable. The doctor seemed to be in a hurry.",
                "Positive experience. The doctor was very kind and available.",
                "The doctor was very attentive and dedicated enough time to the visit.",
                "I am very satisfied. The doctor was very professional and courteous."
            ];

        for ($i = 0; $i < 200; $i++) {
            $review = new Review();

            $review->doctor_profile_id = $faker->numberBetween(1, 20);
            $review->first_name = $faker->firstName();
            $review->last_name = $faker->lastName();
            $review->email = $faker->email();
            $review->review_text = $faker->randomElement($reviewsText);

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
