<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DestinasiWisataController extends Controller
{
    public function create()
    {
        try {
            DB::connection()->getPdo();
            echo 'Berhasil terhubung ke database!';
        } catch (\Exception $e) {
            die('Tidak dapat terhubung ke database: ' . $e->getMessage());
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
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Format dan ukuran gambar yang diizinkan
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

        // Simpan gambar yang diunggah
        if ($request->hasFile('gambar')) {
            // In case multiple images are uploaded, store their paths in an array
            $gambarPaths = [];
            foreach ($request->file('gambar') as $image) {
                // Simpan gambar ke dalam folder penyimpanan (misalnya folder public/images)
                $path = $image->store('images', 'public');
                // Simpan path gambar baru di array
                $gambarPaths[] = $path;
            }

            // Convert the array of paths to JSON and store it in the database
            $destinasiWisata->gambar = json_encode($gambarPaths);
            $destinasiWisata->save();
        }

        // Simpan pesan sukses ke dalam session
        session()->flash('success', 'Destinasi wisata berhasil ditambahkan.');

        return redirect()->route('destinasi-wisata.show', ['id' => $destinasiWisata->id]);
    }

    public function show($id)
    {
        $destinasiWisata = DestinasiWisata::find($id);

        if (!$destinasiWisata) {
            return redirect()
                ->route('destinasi-wisata.index')
                ->with('error', 'Destinasi wisata tidak ditemukan.');
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

    public function edit($id)
    {
        $destinasiWisata = DestinasiWisata::find($id);

        if (!$destinasiWisata) {
            return redirect()
                ->route('destinasi-wisata.index')
                ->with('error', 'Destinasi wisata tidak ditemukan.');
        }

        return view('destinasi_wisata.edit', compact('destinasiWisata'));
    }

    public function destroy($id)
    {
        $destinasiWisata = DestinasiWisata::find($id);

        if (!$destinasiWisata) {
            return redirect()
                ->route('destinasi-wisata.index')
                ->with('error', 'Destinasi wisata tidak ditemukan.');
        }

        $destinasiWisata->delete();

        return redirect()
            ->route('destinasi-wisata.index')
            ->with('success', 'Destinasi wisata berhasil dihapus.');
    }

        public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'HargaTiket' => 'nullable|numeric',
            'FasilitasDestinasi' => 'nullable|string',
            'JamBuka' => 'nullable|string',
            'Deskripsi' => 'nullable|string',
            'Sejarah' => 'nullable|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Format dan ukuran gambar yang diizinkan
        ]);

        // Find the destination by ID
        $destination = DestinasiWisata::find($id);

        // Update the destination data
        $destination->nama = $request->input('nama');
        $destination->alamat = $request->input('alamat');
        $destination->latitude = $request->input('latitude');
        $destination->longitude = $request->input('longitude');
        $destination->HargaTiket = $request->input('HargaTiket');
        $destination->FasilitasDestinasi = $request->input('FasilitasDestinasi');
        $destination->JamBuka = $request->input('JamBuka');
        $destination->Deskripsi = $request->input('Deskripsi');
        $destination->Sejarah = $request->input('Sejarah');

        // Process and update the uploaded images
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama sebelum menyimpan gambar baru (optional)
            if (!empty($destination->gambar)) {
                // Hapus gambar lama dari penyimpanan
                Storage::delete($destination->gambar);
            }

            // In case multiple images are uploaded, store them in an array
            $gambarPaths = [];
            foreach ($request->file('gambar') as $image) {
                // Simpan gambar ke dalam penyimpanan (misalnya folder public/images)
                $path = $image->store('images', 'public');
                // Simpan path gambar baru di array
                $gambarPaths[] = $path;
            }

            // Convert the array of paths to JSON and store it in the database
            $destination->gambar = json_encode($gambarPaths);
        }

        // Save the updated data
        $destination->save();

        // Redirect to the index page or show a success message
        return redirect()
            ->route('destinasi-wisata.index')
            ->with('success', 'Destinasi Wisata berhasil diupdate.');
    }

}
