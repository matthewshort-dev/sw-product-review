<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'name' => 'Cam Whamielson',
                    'email' => 'camwham@hausmail.com',
                    'password' => Hash::make('admin'),
                    'is_admin' => true,
                ],
                [
                    'name' => 'Matt S',
                    'email' => 'matt@hausmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => false,
                ],
                [
                    'name' => 'Garret S',
                    'email' => 'garret@hausmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => false,
                ],
                [
                    'name' => 'Chad F',
                    'email' => 'chad@hausmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => false,
                ],
                [
                    'name' => 'Austin K',
                    'email' => 'austin@hausmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => false,
                ],
                [
                    'name' => 'Racehl P',
                    'email' => 'rachel@hausmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => false,
                ],
                [
                    'name' => 'Kevin T',
                    'email' => 'kevin@hausmail.com',
                    'password' => Hash::make('password'),
                    'is_admin' => false,
                ],
            ]
        );
    }
}
