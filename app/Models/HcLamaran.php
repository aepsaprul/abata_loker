<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HcLamaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'master_jabatan_id',
        'nama_lengkap',
        'telepon',
        'email'
    ];
}
