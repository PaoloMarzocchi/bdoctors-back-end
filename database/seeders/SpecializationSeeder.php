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
                'name' => 'Allergologia',
                'description' => 'La branca che si occupa degli effetti delle allergie stagionali, da contatto e ai medicinali'
            ],
            [
                'name' => 'Cardiologia',
                'description' => 'La branca che si occupa del cuore e di tutto ciò che lo riguarda'
            ],
            [
                'name' => 'Dermatologia',
                'description' => 'La branca che si prende cura della pelle delle persone'
            ],
            [
                'name' => 'Chirurgia',
                'description' => 'Questo è il campo più famoso della scienza medica, dove tutto converge sul piano pratico per salvare le vite'
            ],
            [
                'name' => 'Gastroenterologia',
                'description' => 'Quei dottori cui rivolgersi quando insorgono problemi gastro-intestinali'
            ],
            [
                'name' => 'Medicina del lavoro',
                'description' => 'È quella branca della medicina che si occupa della prevenzione, della diagnosi e della cura delle malattie causate dalle attività lavorative.'
            ],
            [
                'name' => 'Urologia',
                'description' => "La branca specialistica medica e chirurgica che si occupa delle patologie a carico dell'apparato urinario maschile e femminile e degli organi genitali maschili esterni."
            ],
        ];

        foreach ($specializations as $specialization) {
            $newSpec = new Specialization();
            $newSpec->name = $specialization['name'];
            $newSpec->description = $specialization['description'];
            $newSpec->slug = Str::of($newSpec->name)->slug('-');
            $newSpec->save();
        }
    }
}
