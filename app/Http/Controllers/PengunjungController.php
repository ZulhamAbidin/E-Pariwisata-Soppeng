<?php

namespace App\Http\Controllers;

use App\Models\DestinasiWisata;
use App\Models\Komentar;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function index()
    {
        $destinasiWisataList = DestinasiWisata::all();
        return view('pengunjung.destinasi_list', compact('destinasiWisataList'));
    }

    // public function show(DestinasiWisata $destinasiWisata)
    // {
    //     return view('pengunjung.destinasi_detail', compact('destinasiWisata'));
    // }
 public function show(DestinasiWisata $destinasiWisata)
{
    // Ambil data daftar postingan terbaru (kecuali postingan saat ini)
    $daftarPostinganTerbaru = DestinasiWisata::where('id', '!=', $destinasiWisata->id)
                                           ->orderBy('created_at', 'desc')
                                           ->limit(5)
                                           ->get();

    return view('pengunjung.destinasi_detail', compact('destinasiWisata', 'daftarPostinganTerbaru'));
}

    public function tambahKomentar(Request $request, DestinasiWisata $destinasiWisata)
{
    $request->validate([
        'nama' => 'required',
        'isi_komentar' => 'required',
    ]);

    $komentar = new Komentar();
    $komentar->nama = $request->input('nama');
    $komentar->isi_komentar = $request->input('isi_komentar');

    // Validasi jika kolom 'isi_komentar' memang tidak boleh kosong
    if ($komentar->isi_komentar) {
        $destinasiWisata->komentars()->save($komentar);
        return redirect()
            ->back()
            ->with('success', 'Komentar berhasil ditambahkan.');
    } else {
        return redirect()
            ->back()
            ->with('error', 'Komentar harus diisi.');
    }
}

}
