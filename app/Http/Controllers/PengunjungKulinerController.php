<?php

namespace App\Http\Controllers;

use App\Models\DestinasiKuliner;
use App\Models\Komentar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

class PengunjungKulinerController extends Controller
{
    public function index()
    {
        $destinasiKulinerList = DestinasiKuliner::all();
        return view('kuliner.kuliner_list', compact('destinasiKulinerList'));
    }

    public function show(DestinasiKuliner $destinasiKuliner)
    {
        // Ambil data daftar destinasi kuliner terbaru (kecuali destinasi kuliner saat ini)
        $daftarKulinerTerbaru = DestinasiKuliner::where('id', '!=', $destinasiKuliner->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Hitung total rating dan rating rata-rata
        $totalRating = $this->totalRating($destinasiKuliner);
        $averageRating = $this->averageRating($destinasiKuliner);
        $comments = $destinasiKuliner->komentars;

        return view('kuliner.kuliner_detail', compact('destinasiKuliner', 'daftarKulinerTerbaru', 'totalRating', 'averageRating', 'comments'));
    }

    public function totalRating(DestinasiKuliner $destinasiKuliner)
    {
        // Menghitung total rating dari komentar-komentar pada destinasi kuliner
        return $destinasiKuliner->komentars()->sum('rating');
    }

    public function averageRating(DestinasiKuliner $destinasiKuliner)
    {
        // Menghitung rata-rata rating dari komentar-komentar pada destinasi kuliner
        $totalRating = $this->totalRating($destinasiKuliner);
        $totalKomentar = $destinasiKuliner->komentars()->count();

        if ($totalKomentar > 0) {
            return $totalRating / $totalKomentar;
        } else {
            return 0;
        }
    }

    public function tambahKomentar(Request $request, DestinasiKuliner $destinasiKuliner)
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
    $destinasiKuliner->komentars()->save($komentar);

    // Update nilai rata-rata rating di tabel destinasi_Ku$destinasiKuliner
    $averageRating = $destinasiKuliner->komentars->avg('rating');
    $destinasiKuliner->update([
        'rating' => $averageRating,
    ]);

    return redirect()
        ->back()
        ->with('success', 'Komentar dan rating berhasil ditambahkan.');
}

}
