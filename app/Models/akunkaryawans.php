<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akunkaryawans extends Model
{
    use HasFactory;

    protected $fillabel = [
        'name',
        'kode_karyawan',
        'nama_karyawan',
        'tanggal_karyawan',
        'jam_masuk',
        'jam_keluar',
        'jenis_shift'
    ];

    protected $guarded = [];
}
