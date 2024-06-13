<?php

namespace Database\Seeders;

use App\Models\DoctorProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                    'cv' => 'cv1',
                    'photo' => 'photo1',
                    'address' => 'Via Uno 1',
                    'telephone' => '1234567890',
                    'services' => 'Visita Base'
                ],
                [
                    'cv' => 'cv2',
                    'photo' => 'photo2',
                    'address' => 'Via Due 2',
                    'telephone' => '1234567890',
                    'services' => 'Visita Premium'
                ],
                [
                    'cv' => 'cv3',
                    'photo' => 'photo3',
                    'address' => 'Via Tre 3',
                    'telephone' => '1234567890',
                    'services' => 'Visita PRO'
                ],
                [
                    'cv' => 'cv4',
                    'photo' => 'photo4',
                    'address' => 'Via Quattro 4',
                    'telephone' => '1234567890',
                    'services' => 'Visita MRI'
                ],
                [
                    'cv' => 'cv5',
                    'photo' => 'photo5',
                    'address' => 'Via Cinque 5',
                    'telephone' => '1234567890',
                    'services' => 'Visita brutta'
                ],
            ];
        foreach ($doctors as $doctor) {
            $newDoc = new DoctorProfile();
            $newDoc->cv = $doctor['cv'];
            $newDoc->photo = $doctor['photo'];
            $newDoc->address = $doctor['address'];
            $newDoc->telephone = $doctor['telephone'];
            $newDoc->services = $doctor['services'];
            $newDoc->save();
        }
    }
}
