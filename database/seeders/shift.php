<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisShift;
use App\Models\User;

class shift extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        User::create([
            'name' => 'Zoro',
            'email' => 'zorojuro@gmail.com',
            'password' => '1234567$',
            'verifikasi' => '1234567$',
        ]);
        JenisShift::create(
        [
            'code' => '0640',
            'JenisShift' => 'Shift Pagi',
        ]);
        JenisShift::create(
        [
            'code' => '1030',
            'JenisShift' => 'Shift Siang',
        ]);
        JenisShift::create([
            'code' => '2015',
            'JenisShift' => 'Shift Malam',
        ]);
    }
}
