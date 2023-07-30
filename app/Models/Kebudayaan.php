<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebudayaan extends Model
{
    protected $table = 'kebudayaan'; // Nama tabel di database
    protected $fillable = ['nama', 'deskripsi', 'sampul', 'gambar'];

}
