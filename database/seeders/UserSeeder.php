<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'nik' => '111111111',
            'birth_date' => Carbon::create('1999','01','01'),
            'gender' => 'pria',
            'address' => 'Jl. Tangkuban Perahu No.19',
            'phone_number' => '1111111',
            'role' => '1',
            'email' => 'admin@desa.go.id',
            'password' => Hash::make('12345678'),
            'profile_photo_path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8lKIzZjTgL9f_DQ3BLSK09_YOhbv6iKB5Tr4iHmCd3g&s',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
