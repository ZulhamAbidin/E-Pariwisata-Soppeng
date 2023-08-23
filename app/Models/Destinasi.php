<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $table = 'destinasi'; // Menunjukkan tabel yang sesuai
    

    protected $fillable = [
        'nama',
        'alamat', 
        'HargaTiket',
        'FasilitasDestinasi',
        'JamBuka',
        'Deskripsi',
        'Sejarah',
        'rating',
        'latitude',
        'longitude',
        'MenuKuliner',
        'sampul',
        'gambar',
        'kategori',
    ];

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'destinasi_id');
    }

    public function totalRating()
    {
        // Menghitung total rating dari komentar-komentar pada postingan destinasi hotel
        return $this->komentars()->sum('rating');
    }

    public function averageRating()
    {
        // Menghitung rata-rata rating dari komentar-komentar pada postingan destinasi hotel
        $totalRating = $this->totalRating();
        $totalKomentar = $this->komentars()->count();

        if ($totalKomentar > 0) {
            return $totalRating / $totalKomentar;
        } else {
            return 0;
        }
    }

    public function totalKomentar()
    {
        return $this->komentars()->count();
    }

    public function getTotalRatingAttribute()
    {
        return $this->komentars->sum('rating');
    }
    
}
