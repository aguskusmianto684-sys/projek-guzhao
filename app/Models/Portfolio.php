<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'judul',
        'kategori',
        'instansi',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
    ];
}
