<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    // karena tabel bukan jamak
    protected $table = 'skill';

    protected $fillable = [
        'skill',
        'percent',
        'description',
    ];
}
