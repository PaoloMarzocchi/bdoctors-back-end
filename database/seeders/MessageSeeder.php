<?php

namespace Database\Seeders;

use App\Models\DoctorProfile;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $messagesText =
            [
                "Hello Doctor, I have been experiencing severe headaches for the past week. Can we schedule an appointment?",
                "Good afternoon, Doctor. I would like to discuss my recent blood test results with you. When are you available?",
                "Dear Doctor, I need a prescription refill for my medication. Can you assist me with this?",
                "Hi Doctor, I have been feeling unusually tired and weak. Could I book a consultation?",
                "Hello, I am having persistent stomach pain and need your advice. Can I come in for a visit?",
                "Good morning, Doctor. My child has been having a persistent cough. Can you suggest a suitable time for us to come in?",
                "Dear Doctor, I am experiencing skin rashes and would like to get them checked. When can I see you?",
                "Hi, I have some questions about my recent diagnosis. Can we discuss this over a call?",
                "Hello Doctor, I need to update my vaccination records. Can you help me with that?",
                "Good afternoon, Doctor. I am having trouble sleeping. Can we arrange a consultation?",
                "Dear Doctor, I would like to discuss the side effects I am experiencing from my current medication. Can I schedule a visit?",
                "Hi Doctor, I have been having joint pain recently. Could you recommend a time for an appointment?",
                "Hello, I am looking for advice on managing my diabetes. When would you be available for a consultation?",
                "Good morning, Doctor. I need to get a medical certificate for my work. Can I come by your office?",
                "Dear Doctor, I am planning to travel soon and need to discuss necessary vaccinations. Can we set up a time to talk?",
                "Hi Doctor, my back pain has not improved with treatment. Can we re-evaluate my condition?",
                "Hello Doctor, I am feeling anxious and stressed. Can we discuss possible treatments?",
                "Good afternoon, Doctor. I have been experiencing vision problems. When can I see you?",
                "Dear Doctor, I need advice on a diet plan suitable for my condition. Can we meet to discuss this?",
                "Hi, I have some concerns about my upcoming surgery. Could we schedule a time to talk?"
            ];

        for ($i = 0; $i < 200; $i++) {
            $message = new Message();

            $message->doctor_profile_id = $faker->numberBetween(1, 5);
            $message->sender_first_name = $faker->firstName();
            $message->sender_last_name = $faker->lastName();
            $message->email = $faker->email();
            $message->message_text = $faker->randomElement($messagesText);

            // Generate a random faker date
            $randomDateTime = $faker->dateTimeBetween('-1 year', 'now');

            // Format the date in "YYYY-MM-DD hh:mm:ss"
            $formattedDateTime = $randomDateTime->format('Y-m-d H:i:s');

            // Set created_at and updated_at 
            $message->created_at = $formattedDateTime;
            $message->updated_at = $formattedDateTime;

            $message->save();
        }
    }
}
