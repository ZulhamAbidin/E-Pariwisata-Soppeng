<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DestinasiWisataController extends Controller
{
    public function create()
    {
        try {
            DB::connection()->getPdo();
            echo "Berhasil terhubung ke database!";
        } catch (\Exception $e) {
            die("Tidak dapat terhubung ke database: " . $e->getMessage());
        }

        return view('destinasi_wisata.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'HargaTiket' => 'nullable|string|max:255',
        'FasilitasDestinasi' => 'nullable|string|max:255',
        'JamBuka' => 'nullable|string|max:255',
        'Deskripsi' => 'nullable|string',
        'Sejarah' => 'nullable|string',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
    ]);

    $nama = $request->input('nama');
    $alamat = $request->input('alamat');
    $hargaTiket = $request->input('HargaTiket');
    $fasilitasDestinasi = $request->input('FasilitasDestinasi');
    $jamBuka = $request->input('JamBuka');
    $deskripsi = $request->input('Deskripsi');
    $sejarah = $request->input('Sejarah');
    $latitude = $request->input('latitude');
    $longitude = $request->input('longitude');

    // Simpan data ke dalam database
    $destinasiWisata = new DestinasiWisata([
        'nama' => $nama,
        'alamat' => $alamat,
        'HargaTiket' => $hargaTiket,
        'FasilitasDestinasi' => $fasilitasDestinasi,
        'JamBuka' => $jamBuka,
        'Deskripsi' => $deskripsi,
        'Sejarah' => $sejarah,
        'latitude' => $latitude,
        'longitude' => $longitude,
    ]);

    $destinasiWisata->save();

    // Simpan pesan sukses ke dalam session
    session()->flash('success', 'Destinasi wisata berhasil ditambahkan.');

    return redirect()->route('destinasi-wisata.show', ['id' => $destinasiWisata->id]);
}


    public function show($id)
    {
        $destinasiWisata = DestinasiWisata::find($id);

        if (!$destinasiWisata) {
            return redirect()->route('destinasi-wisata.index')->with('error', 'Destinasi wisata tidak ditemukan.');
        }

        return view('destinasi_wisata.show', compact('destinasiWisata'));
    }


    public function index()
{
    $destinasiWisataList = DestinasiWisata::all();

    return view('destinasi_wisata.index', ['destinasiWisataList' => $destinasiWisataList]);
}


    private function geocodeAlamat($alamat)
    {
        $url = 'https://nominatim.openstreetmap.org/search?q=' . urlencode($alamat) . '&format=json';

        try {
            // Periksa apakah ada batas waktu timeout untuk permintaan (opsional)
            $response = Http::timeout(10)->get($url, [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0',
                ],
            ]);

            $data = $response->json();

            if (is_array($data) && count($data) > 0) {
                return $data[0];
            }

            return null;
        } catch (Exception $e) {
            // Tangani kesalahan jika ada
            return null;
        }
    }
}
