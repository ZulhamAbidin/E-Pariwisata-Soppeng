<?php

namespace App\Models;

use App\Models\Destinasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentars';

    protected $fillable = ['destinasi_wisata_id', 'destinasi_kuliner_id', 'destinasi_hotel_id', 'nama', 'isi_komentar', 'rating'];

    protected $attributes = [
        'isi_komentar' => null,
    ];

    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class, 'destinasi_id');
    }

    public function destinasiWisata()
    {
        return $this->belongsTo(DestinasiWisata::class, 'destinasi_wisata_id');
    }

    public function destinasiKuliner()
    {
        return $this->belongsTo(DestinasiKuliner::class, 'destinasi_kuliner_id');
    }

    public function destinasiHotel()
    {
        return $this->belongsTo(DestinasiHotel::class, 'destinasi_hotel_id');
    }

    public function Kebudayaan()
    {
        return $this->belongsTo(Kebudayaan::class, 'kebudayaan_id');
    }
}
