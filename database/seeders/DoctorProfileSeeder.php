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
        /* $doctorprofilecvs = ['cv1', 'cv2', 'cv3', 'cv4', 'cv5'];
        $doctorprofilephotos = ['photo1', 'photo2', 'photo3', 'photo4', 'photo5'];
        $doctorprofileaddress = ['Via Uno 1', 'Via Due 2', 'Via Tre 3', 'Via Quattro 4', 'Via Cinque 5',];
        $doctorprofiletelephones = ['1234567890', '1234567890', '1234567890', '1234567890', '1234567890',];
        $doctorprofileservices = ['Visita base', 'Visita Premium', 'Visita MRI', 'Visita PRO', 'Visita brutta']; */
        $doctors =
            [
                [
                    'user_id' => '1',
                    'surname' => 'di Lauro',
                    'cv' => 'cv1',
                    'photo' => 'photo1',
                    'address' => 'Via Uno 1',
                    'telephone' => '1234567890',
                    'services' => 'Visita Base'
                ],
                [
                    'user_id' => '2',
                    'surname' => 'Cerri',
                    'cv' => 'cv2',
                    'photo' => 'photo2',
                    'address' => 'Via Due 2',
                    'telephone' => '1234567890',
                    'services' => 'Visita Premium'
                ],
                [
                    'user_id' => '3',
                    'surname' => 'Nolberto',
                    'cv' => 'cv3',
                    'photo' => 'photo3',
                    'address' => 'Via Tre 3',
                    'telephone' => '1234567890',
                    'services' => 'Visita PRO'
                ],
                [
                    'user_id' => '4',
                    'surname' => 'Strazzera',
                    'cv' => 'cv4',
                    'photo' => 'photo4',
                    'address' => 'Via Quattro 4',
                    'telephone' => '1234567890',
                    'services' => 'Visita MRI'
                ],
                [
                    'user_id' => '5',
                    'surname' => 'Marzocchi',
                    'cv' => 'cv5',
                    'photo' => 'photo5',
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
