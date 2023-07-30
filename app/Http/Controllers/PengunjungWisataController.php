<?php

namespace App\Http\Controllers;

use App\Models\DestinasiWisata;
use App\Models\Komentar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

class PengunjungWisataController extends Controller
{
    public function index()
    {
        $destinasiWisataList = DestinasiWisata::all();
        return view('wisata.wisata_list', compact('destinasiWisataList'));
    }

    public function show(DestinasiWisata $destinasiWisata)
    {
        // Ambil data daftar postingan terbaru (kecuali postingan saat ini)
        $daftarPostinganTerbaru = DestinasiWisata::where('id', '!=', $destinasiWisata->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        // Hitung total rating dan rating rata-rata
        $totalRating = $this->totalRating($destinasiWisata);
        $averageRating = $this->averageRating($destinasiWisata);
        $comments = $destinasiWisata->komentars;

        return view('wisata.wisata_detail', compact('destinasiWisata', 'daftarPostinganTerbaru', 'totalRating', 'averageRating', 'comments'));
    }

    public function totalRating(DestinasiWisata $destinasiWisata)
    {
        // Menghitung total rating dari komentar-komentar pada postingan destinasi
        return $destinasiWisata->komentars()->sum('rating');
    }

    public function averageRating(DestinasiWisata $destinasiWisata)
    {
        // Menghitung rata-rata rating dari komentar-komentar pada postingan destinasi
        $totalRating = $this->totalRating($destinasiWisata);
        $totalKomentar = $destinasiWisata->komentars()->count();

        if ($totalKomentar > 0) {
            return $totalRating / $totalKomentar;
        } else {
            return 0;
        }
    }

public function tambahKomentar(Request $request, DestinasiWisata $destinasiWisata)
{
    $validator = Validator::make($request->all(), [
        'nama' => ['required', 'regex:/^[a-zA-Z\s]+$/'], // Hanya huruf dan spasi yang diperbolehkan
        'isi_komentar' => 'required',
        'rating' => 'required|numeric|min:1|max:5', // Validasi rating antara 1 hingga 5
    ]);

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Membuat objek Komentar
    $komentar = new Komentar([
        'nama' => $request->input('nama'),
        'isi_komentar' => $request->input('isi_komentar'),
        'rating' => $request->input('rating'),
    ]);

    // Simpan komentar ke dalam tabel komentars yang berelasi dengan destinasi wisata
    $destinasiWisata->komentars()->save($komentar);

    // Update nilai rata-rata rating di tabel destinasi_wisata
    $averageRating = $destinasiWisata->komentars->avg('rating');
    $destinasiWisata->update([
        'rating' => $averageRating,
    ]);

    return redirect()
        ->back()
        ->with('success', 'Komentar dan rating berhasil ditambahkan.');
}

}
