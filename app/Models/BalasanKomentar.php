<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalasanKomentar extends Model
{
    protected $table = 'balasan_komentars'; // Menentukan nama tabel yang digunakan oleh model
    
    protected $fillable = ['isi_balasan', 'komentar_id', 'parent_komentar_id'];

    // public function komentar()
    // {
    //     return $this->belongsTo(Komentar::class, 'komentar_id');
    // }

    // public function parentBalasanKomentars()
    // {
    //     return $this->hasMany(BalasanKomentar::class, 'parent_komentar_id');
    // }

    public function komentar()
    {
        return $this->belongsTo(Komentar::class, 'parent_komentar_id');
    }
}
