<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'nik' => '111111111',
                'email' => 'admin@desa.go.id',
                'password' => Hash::make('12345678'),
                'profile_photo_path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8lKIzZjTgL9f_DQ3BLSK09_YOhbv6iKB5Tr4iHmCd3g&s',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kuratul Aini',
                'nik' => '2222222222',
                'email' => 'kuratul.aini@gmail.go.id',
                'password' => Hash::make('12345678'),
                'profile_photo_path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8lKIzZjTgL9f_DQ3BLSK09_YOhbv6iKB5Tr4iHmCd3g&s',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        User::insert($users);
    }
}
