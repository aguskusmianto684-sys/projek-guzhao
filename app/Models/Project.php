<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Nama tabel (karena tidak pakai default 'projects')
    protected $table = 'project';

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'image',
        'title',
        'job',
        'category',
        'description',
    ];
}
