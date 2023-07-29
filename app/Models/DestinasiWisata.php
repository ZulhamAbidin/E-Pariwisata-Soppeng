<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class DestinasiWisata extends Model
// {
//     protected $fillable = ['nama', 'alamat', 'latitude', 'longitude'];
//     use HasFactory;
// }


// app/Models/DestinasiWisata.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinasiWisata extends Model
{
    protected $table = 'destinasi_wisata'; // Nama tabel yang sesuai dengan tabel di database
    //  protected $fillable = [
    //     'nama',
    //     'alamat',
    //     'HargaTiket',
    //     'FasilitasDestinasi',
    //     'JamBuka',
    //     'Deskripsi',
    //     'Sejarah',
    //     'latitude',
    //     'longitude',
    //     'image_path', // Tambahkan kolom image_path
    // ];
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
}
