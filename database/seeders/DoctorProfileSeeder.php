<?php

namespace Database\Seeders;

use App\Models\DoctorProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DoctorProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors =
            [
                [
                    'user_id' => '1',
                    'surname' => 'di Lauro',
                    'cv' => null,
                    'photo' => null,
                    'address' => 'Via Uno 1',
                    'telephone' => '1234567890',
                    'services' => 'Visita Base'
                ],
                [
                    'user_id' => '2',
                    'surname' => 'Cerri',
                    'cv' => null,
                    'photo' => null,
                    'address' => 'Via Due 2',
                    'telephone' => '1234567890',
                    'services' => 'Visita Premium'
                ],
                [
                    'user_id' => '3',
                    'surname' => 'Nolberto',
                    'cv' => null,
                    'photo' => null,
                    'address' => 'Via Tre 3',
                    'telephone' => '1234567890',
                    'services' => 'Visita PRO'
                ],
                [
                    'user_id' => '4',
                    'surname' => 'Strazzera',
                    'cv' => null,
                    'photo' => null,
                    'address' => 'Via Quattro 4',
                    'telephone' => '1234567890',
                    'services' => 'Visita MRI'
                ],
                [
                    'user_id' => '5',
                    'surname' => 'Marzocchi',
                    'cv' => null,
                    'photo' => null,
                    'address' => 'Via Cinque 5',
                    'telephone' => '1234567890',
                    'services' => 'Visita brutta'
                ],
            ];
        foreach ($doctors as $key => $doctor) {
            $newDoc = new DoctorProfile();
            $newDoc->user_id = User::find($key + 1)->id;
            $newDoc->surname = $doctor['surname'];
            $newDoc->slug = Str::of(User::find($key + 1)->name)->slug('-') . '-' . Str::of($newDoc->surname)->slug('-');
            $newDoc->cv = $doctor['cv'];
            $newDoc->photo = $doctor['photo'];
            $newDoc->address = $doctor['address'];
            $newDoc->telephone = $doctor['telephone'];
            $newDoc->services = $doctor['services'];
            $newDoc->save();
        }
    }
}
