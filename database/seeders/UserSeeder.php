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
        $userdata = [
            [

                'check' => ['email' => 'admin@mail.com'],
                'data' => [
                    'role_id' => 1,
                    'name' => 'nodar meladze',
                    'position' => 'system administrator',
                    'phone_number' => '571034421',
                    'address' => 'Georgia ,Chiatura',
                    'email_verified_at' => now(),
                    'password' => Hash::make('admin'),
                ]
            ],
            [
                'check' => ['email' => 'manager@Mail.com'],
                'data' => [
                    'role_id' => 2,
                    'name' => 'gocha meladze',
                    'position' => 'factory manager',
                    'phone_number' => '571123456',
                    'address' => 'Georgia ,Chiatura',
                    'email_verified_at' => now(),
                    'password' => Hash::make('manager'),
                ]
            ],
            [
                'check' => ['email' => 'user@Mail.com'],
                'data' => [
                    'role_id' => 3,
                    'name' => 'Tommy Shelby',
                    'position' => 'user',
                    'phone_number' => '571777777',
                    'address' => 'Georgia ,Chiatura',
                    'email_verified_at' => now(),
                    'password' => Hash::make('user'),
                ]
            ]
        ];

        foreach ($userdata as $data) {
            User::firstOrCreate($data['check'], $data['data']);
        }
    }
}
