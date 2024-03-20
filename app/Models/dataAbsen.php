<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataAbsen extends Model
{
    use HasFactory;
    protected $fillabel = [
        'kode_karyawan',
        'nama_karyawan',
        'tanggal_absensi',
        'jam_masuk',
        'jam_keluar',
    ];
    protected $guarded =[];
}
