<?php

namespace Database\Seeders;

use App\Models\DoctorProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DoctorProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/json/doctorProfiles.json');
        $doctors = json_decode($json, true);

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
