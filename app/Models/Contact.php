<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // karena nama tabel bukan "contacts"
    protected $table = 'contact';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'phone',
        'massage',
    ];
}
