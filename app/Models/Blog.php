<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog'; // karena nama tabel bukan blogs

    protected $fillable = [
        'image',
        'date',
        'author',
        'title',
        'description',
    ];

    // karena di migration kamu tidak pakai timestamps()
    public $timestamps = false;
}
