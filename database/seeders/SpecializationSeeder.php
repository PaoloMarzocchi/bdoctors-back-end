<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            [
                'name' => 'Allergology',
                'description' => 'The branch that deals with the effects of seasonal, contact, and medication allergies',
                'icon' => 'fa-wheat-awn-circle-exclamation'
            ],
            [
                'name' => 'Cardiology',
                'description' => 'The branch that deals with the heart and everything related to it',
                'icon' => 'fa-heart-pulse'
            ],
            [
                'name' => 'Dermatology',
                'description' => "The branch that takes care of people's skin",
                'icon' => 'fa-hand-dots'
            ],
            [
                'name' => 'Surgery',
                'description' => 'This is the most famous field of medical science, where everything converges on the practical level to save lives',
                'icon' => 'fa-bandage'
            ],
            [
                'name' => 'Gastroenterology',
                'description' => 'Those doctors to turn to when gastrointestinal problems arise',
                'icon' => 'fa-viruses'
            ],
            [
                'name' => 'Occupational Medicine',
                'description' => 'It is the branch of medicine that deals with the prevention, diagnosis, and treatment of diseases caused by work activities.',
                'icon' => 'fa-briefcase-medical'
            ],
            [
                'name' => 'Urology',
                'description' => 'The medical and surgical specialty that deals with diseases of the male and female urinary tract and the male external genital organs.',
                'icon' => 'fa-venus-mars'
            ]
        ];

        foreach ($specializations as $specialization) {
            $newSpec = new Specialization();
            $newSpec->name = $specialization['name'];
            $newSpec->description = $specialization['description'];
            $newSpec->icon = $specialization['icon'];
            $newSpec->slug = Str::of($newSpec->name)->slug('-');
            $newSpec->save();
        }
    }
}
