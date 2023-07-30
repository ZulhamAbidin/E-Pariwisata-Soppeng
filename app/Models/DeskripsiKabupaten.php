<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeskripsiKabupaten extends Model
{
    protected $table = 'deskripsi_kabupaten';
    
    protected $fillable = ['deskripsi', 'visi_misi', 'sejarah', 'geografis'];
}
