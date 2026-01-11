<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $fillable = [
        'name',
        'born',
        'address',
        'zip_code',
        'email',
        'phone',
        'total_project',
        'work',
        'image',
        'description',
    ];
}
