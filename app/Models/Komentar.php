<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentars';

    protected $fillable = ['destinasi_wisata_id', 'destinasi_kuliner_id', 'nama', 'isi_komentar', 'rating'];
    
    public function destinasiWisata()
    {
        return $this->belongsTo(DestinasiWisata::class, 'destinasi_wisata_id');
    }

    public function destinasiKuliner()
    {
        return $this->belongsTo(DestinasiKuliner::class, 'destinasi_kuliner_id');
    }
}
