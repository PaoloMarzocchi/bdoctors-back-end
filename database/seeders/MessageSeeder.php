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
        for ($i = 0; $i < 30; $i++) {
            $message = new Message();

            $message->doctor_profile_id = $faker->numberBetween(1, 5);
            $message->sender_first_name = $faker->firstName();
            $message->sender_last_name = $faker->lastName();
            $message->email = $faker->email();
            $message->message_text = $faker->text();
            $message->save();
        }
    }
}
