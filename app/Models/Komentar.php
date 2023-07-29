<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentars';

    protected $fillable = ['destinasi_wisata_id', 'nama', 'komentar'];
    
    public function destinasiWisata()
    {
        return $this->belongsTo(DestinasiWisata::class);
    }
}
