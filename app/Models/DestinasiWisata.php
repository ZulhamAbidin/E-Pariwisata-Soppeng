<?php

namespace App\Models;

use App\Models\Komentar;
use Illuminate\Database\Eloquent\Model;

class DestinasiWisata extends Model
{
    protected $table = 'destinasi_wisata'; // Nama tabel yang sesuai dengan tabel di database
    protected $fillable = [
        'nama',
        'alamat',
        'HargaTiket',
        'FasilitasDestinasi',
        'JamBuka',
        'Deskripsi',
        'Sejarah',
        'latitude',
        'longitude',
        'sampul', // Ubah "image_path" menjadi "sampul" untuk sesuai dengan skema database
        'gambar', // Tambahkan kolom "gambar" untuk sesuai dengan skema database
    ];

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'destinasi_wisata_id');
    }
}
