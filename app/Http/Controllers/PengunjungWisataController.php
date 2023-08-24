<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Destinasi;
use Illuminate\Http\Request;
use App\Models\BalasanKomentar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PengunjungWisataController extends Controller
{
    
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
            $query->where('kategori', 'wisata');
        } else {
            // Filter by kategori if no search query
            $query->where('kategori', 'wisata');
        }

        // Get paginated results
        $destinasiWisataList = $query->paginate(2); // Ganti 2 dengan jumlah item per halaman yang diinginkan

        return view('wisata.wisata_list', compact('destinasiWisataList'));
    }

    public function show(Destinasi $destinasiWisata)
    {
        // Ambil data daftar postingan terbaru (kecuali postingan saat ini)
        // $daftarPostinganTerbaru = Destinasi::where('id', '!=', $destinasiWisata->id)
        //     ->orderBy('created_at', 'desc')
        //     ->limit(5)
        //     ->get();

         $daftarPostinganTerbaru = Destinasi::where('kategori', 'Wisata')
            ->where('id', '!=', $destinasiWisata->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();


        // Hitung total rating dan rating rata-rata
        $totalRating = $this->totalRating($destinasiWisata);
        $averageRating = $this->averageRating($destinasiWisata);
        $comments = $destinasiWisata->komentars;

        return view('wisata.wisata_detail', compact('destinasiWisata', 'daftarPostinganTerbaru', 'totalRating', 'averageRating', 'comments'));
    }

    public function totalRating(Destinasi $destinasiWisata)
    {
        // Menghitung total rating dari komentar-komentar pada postingan destinasi
        return $destinasiWisata->komentars()->sum('rating');
    }

    public function averageRating(Destinasi $destinasiWisata)
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

public function tambahKomentar(Request $request, Destinasi $destinasiWisata)
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

  public function tambahBalasanKomentar(Request $request, Destinasi $destinasiWisata, $komentarId)
    {
        $komentar = Komentar::findOrFail($komentarId);

        $validator = Validator::make($request->all(), [
            'isi_balasan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $parentKomentarId = $komentar->id;

        // Inisialisasi centang_biru dengan false
        $centangBiru = false;

        // Periksa apakah pengguna telah login
        if (Auth::check()) {
            $centangBiru = true; // Jika pengguna telah login, atur centang_biru menjadi true
        }

        // Membuat objek BalasanKomentar dengan isi_balasan yang diambil dari form
        $balasanKomentar = new BalasanKomentar([
            'nama' => $request->input('nama'),
            'isi_balasan' => $request->input('isi_balasan'),
            'komentar_id' => $komentar->id,
            'parent_komentar_id' => $parentKomentarId,
            'centang_biru' => $centangBiru, // Tambahkan nilai centang_biru ke objek BalasanKomentar
        ]);

        $balasanKomentar->save();

        return redirect()
            ->route('pengunjung.destinasi.show', ['destinasiWisata' => $destinasiWisata->id])
            ->with('success', 'Balasan komentar berhasil ditambahkan.');
    }
    
    public function totalBalasanKomentar(Destinasi $destinasiWisata)
    {
        return $destinasiWisata->totalBalasanKomentar();
    }

}
