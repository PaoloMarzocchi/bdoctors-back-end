<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =
            [
                [
                    'name' => 'Marino',
                    'email' => 'marinodilauro@email.it',
                    'password' => 'password',
                ],
                [
                    'name' => 'Simone',
                    'email' => 'simonecerri@email.it',
                    'password' => 'password',

                ],
                [
                    'name' => 'Simone',
                    'email' => 'simonenolberto@email.it',
                    'password' => 'password'
                ],
                [
                    'name' => 'Matteo',
                    'email' => 'matteostrazzera@email.it',
                    'password' => 'password'
                ],
                [
                    'name' => 'Paolo',
                    'email' => 'paolomarzocchi@email.it',
                    'password' => 'password'

                ],
            ];

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);

            $newUser->save();
        }
    }
}
