<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Komentar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

class PengunjungKulinerController extends Controller
{
    // public function index()
    // {
    //     $destinasiKulinerList = Destinasi::all();
    //     return view('kuliner.kuliner_list', compact('destinasiKulinerList'));
    // }

    public function index(Request $request)
    {
        $query = Destinasi::query();

        // Check if there is a search query
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($subquery) use ($search) {
                $subquery->where('nama', 'LIKE', '%' . $search . '%')->orWhere('alamat', 'LIKE', '%' . $search . '%');
            });

            // Add filter by kategori
            $query->where('kategori', 'kuliner');
        } else {
            // Filter by kategori if no search query
            $query->where('kategori', 'kuliner');
        }

        // Get paginated results
        $destinasiKulinerList = $query->paginate(2); // Ganti 2 dengan jumlah item per halaman yang diinginkan

        return view('kuliner.kuliner_list', compact('destinasiKulinerList'));
    }

    public function show(Destinasi $destinasiKuliner)
    {               
        $daftarKulinerTerbaru = Destinasi::where('kategori', 'Kuliner')
            ->where('id', '!=', $destinasiKuliner->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Hitung total rating dan rating rata-rata
        $totalRating = $this->totalRating($destinasiKuliner);
        $averageRating = $this->averageRating($destinasiKuliner);
        $comments = $destinasiKuliner->komentars;

        return view('kuliner.kuliner_detail', compact('destinasiKuliner', 'daftarKulinerTerbaru', 'totalRating', 'averageRating', 'comments'));
    }

    public function totalRating(Destinasi $destinasiKuliner)
    {
        // Menghitung total rating dari komentar-komentar pada destinasi kuliner
        return $destinasiKuliner->komentars()->sum('rating');
    }

    public function averageRating(Destinasi $destinasiKuliner)
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

    public function tambahKomentar(Request $request, Destinasi $destinasiKuliner)
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
