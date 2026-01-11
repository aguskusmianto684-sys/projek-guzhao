<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // nama tabel (karena bukan default 'services')
    protected $table = 'service';

    // field yang boleh di–insert / update
    protected $fillable = [
        'icon',
        'job',
    ];
}
