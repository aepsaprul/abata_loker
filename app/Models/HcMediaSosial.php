<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HcMediaSosial extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'facebook',
        'instagram',
        'youtube',
        'linkedin'
    ];
}
