<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class PengunjungKebudayaanController extends Controller
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
            $query->where('kategori', 'kebudayaan');
        } else {
            // Filter by kategori if no search query
            $query->where('kategori', 'kebudayaan');
        }

        // Get paginated results
        $destinasikebudayaanList = $query->paginate(2); // Ganti 2 dengan jumlah item per halaman yang diinginkan

        return view('kebudayaan.kebudayaan_list', compact('destinasikebudayaanList'));
    }

    public function show(Destinasi $destinasikebudayaan)
    {
        // Ambil data daftar destinasi kebudayaan terbaru (kecuali destinasi kebudayaan saat ini)
        // $daftarkebudayaanTerbaru = Destinasi::where('id', '!=', $destinasikebudayaan->id)
        //     ->orderBy('created_at', 'desc')
        //     ->limit(5)
        //     ->get();

        $daftarkebudayaanTerbaru = Destinasi::where('kategori', 'Kebudayaan')
            ->where('id', '!=', $destinasikebudayaan->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Hitung total rating dan rating rata-rata
        $totalRating = $this->totalRating($destinasikebudayaan);
        $averageRating = $this->averageRating($destinasikebudayaan);
        $comments = $destinasikebudayaan->komentars;

        return view('kebudayaan.kebudayaan_detail', compact('destinasikebudayaan', 'daftarkebudayaanTerbaru', 'totalRating', 'averageRating', 'comments'));
    }

    public function totalRating(Destinasi $destinasikebudayaan)
    {
        // Menghitung total rating dari komentar-komentar pada destinasi kebudayaan
        return $destinasikebudayaan->komentars()->sum('rating');
    }

    public function averageRating(Destinasi $destinasikebudayaan)
    {
        // Menghitung rata-rata rating dari komentar-komentar pada destinasi kebudayaan
        $totalRating = $this->totalRating($destinasikebudayaan);
        $totalKomentar = $destinasikebudayaan->komentars()->count();

        if ($totalKomentar > 0) {
            return $totalRating / $totalKomentar;
        } else {
            return 0;
        }
    }

    public function tambahKomentar(Request $request, Destinasi $destinasikebudayaan)
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

        // Simpan komentar ke dalam tabel komentars yang berelasi dengan destinasi kebudayaan
        $destinasikebudayaan->komentars()->save($komentar);

        // Update nilai rata-rata rating di tabel destinasi_kebudayaan
        $averageRating = $destinasikebudayaan->komentars->avg('rating');
        $destinasikebudayaan->update([
            'rating' => $averageRating,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Komentar dan rating berhasil ditambahkan.');
    }

      public function tambahBalasanKomentar(Request $request, Destinasi $destinasikebudayaan, $komentarId)
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
            ->route('pengunjung.kebudayaan.show', ['destinasikebudayaan' => $destinasikebudayaan->id])
            ->with('success', 'Balasan komentar berhasil ditambahkan.');
    }
    
    public function totalBalasanKomentar(Destinasi $destinasikebudayaan)
    {
        return $destinasikebudayaan->totalBalasanKomentar();
    }
}
