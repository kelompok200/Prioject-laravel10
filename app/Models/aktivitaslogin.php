<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aktivitaslogin extends Model
{
    use HasFactory;

    protected $fillabel = [
        'nama',
        'username',
    ];
    protected $guarded = [];
}
