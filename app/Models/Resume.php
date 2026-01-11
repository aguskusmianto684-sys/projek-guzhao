<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $table = 'resume';
    protected $fillable = [
        'date',
        'job',
        'place',
        'summary',
        'description'
    ];
}
