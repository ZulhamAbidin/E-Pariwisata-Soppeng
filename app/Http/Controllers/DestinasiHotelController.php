<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Destinasi;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DestinasiHotelController extends Controller
{
    public function create()
    {
        try {
            DB::connection()->getPdo();
            echo 'Berhasil terhubung ke database!';
        } catch (\Exception $e) {
            die('Tidak dapat terhubung ke database: ' . $e->getMessage());
        }

        return view('destinasi_hotel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'JamBuka' => 'nullable|string|max:255',
            'Deskripsi' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048', // Format dan ukuran gambar sampul yang diizinkan
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:20048', // Format dan ukuran gambar yang diizinkan
        ], [
            'nama.required' => 'Pastikan Anda mengisi nama destinasi Hotel.',
            'alamat.required' => 'Pastikan Anda mengisi alamat destinasi Hotel.',
            'latitude.required' => 'Pastikan Anda Memilih Lokasi Destinasi Hotel.',
            'longitude.required' => 'Pastikan Anda Memilih Lokasi Destinasi Hotel.',
            'gambar.0.image' => 'Pastikan Anda Memilih gambar yang sesuai dengan format dan size yang telah ditentukan.',
            'gambar.0.mimes' => 'Pastikan Anda Memilih gambar dengan format: jpeg, png, jpg, gif.',
        ]);

        // Ambil data dari form
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $jamBuka = $request->input('JamBuka');
        $deskripsi = $request->input('Deskripsi');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Simpan data ke dalam database
        $destinasihotel = new Destinasi([
            'nama' => $nama,
            'alamat' => $alamat,
            'JamBuka' => $jamBuka,
            'Deskripsi' => $deskripsi,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'kategori' => 'hotel',
        ]);

        // Upload dan simpan gambar sampul
        if ($request->hasFile('sampul')) {
            // Simpan gambar sampul ke dalam folder penyimpanan (misalnya folder public/images)
            $sampulPath = $request->file('sampul')->store('images', 'public');

            // Simpan path gambar sampul di kolom "sampul" pada tabel
            $destinasihotel->sampul = $sampulPath;
        }

        // Upload dan simpan gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $gambarPaths = [];
            foreach ($request->file('gambar') as $image) {
                // Simpan gambar ke dalam folder penyimpanan (misalnya folder public/images)
                $path = $image->store('images', 'public');
                // Simpan path gambar baru di array
                $gambarPaths[] = $path;
            }

            // Convert the array of paths to JSON and store it in the database
            $destinasihotel->gambar = json_encode($gambarPaths);
        }

        if ($destinasihotel->save()) {
            // Tampilkan SweetAlert berhasil
            return redirect()
                ->route('destinasi-hotel.index')
                ->with('success', 'Destinasi Hotel berhasil ditambahkan.');
        } else {
            // Tampilkan SweetAlert gagal
            return redirect()
                ->back()
                ->with('error', 'Gagal menambahkan destinasi Hotel.');
        }
    }

    public function show($id)
    {
        $destinasihotel = Destinasi::find($id);

        if (!$destinasihotel) {
            return redirect()
                ->route('destinasi-hotel.index')
                ->with('error', 'Destinasi Hotel tidak ditemukan.');
        }

        return view('destinasi_hotel.show', compact('destinasihotel'));
    }

    // public function index()
    // {
    //     // $destinasihotelList = Destinasi::all();
    //     $destinasihotelList = Destinasi::where('kategori', 'Hotel')->get();

    //     return view('destinasi_Hotel.index', ['destinasihotelList' => $destinasihotelList]);
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
            $query->where('kategori', 'hotel');
        } else {
            // Filter by kategori if no search query
            $query->where('kategori', 'hotel');
        }

        // Get paginated results
        $destinasihotelList = $query->paginate(2); // Ganti 2 dengan jumlah item per halaman yang diinginkan

        return view('destinasi_Hotel.index', ['destinasihotelList' => $destinasihotelList]);
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
        $destinasihotel = Destinasi::find($id);

        if (!$destinasihotel) {
            return redirect()
                ->route('destinasi-hotel.index')
                ->with('error', 'Destinasi hotel tidak ditemukan.');
        }

        return view('destinasi_hotel.edit', compact('destinasihotel'));
    }

    public function destroy($id)
    {
        $destinasihotel = Destinasi::find($id);

        if (!$destinasihotel) {
            return redirect()
                ->route('destinasi-hotel.index')
                ->with('error', 'Destinasi Hotel tidak ditemukan.');
        }

        $destinasihotel->delete();

        return redirect()
            ->route('destinasi-hotel.index')
            ->with('success', 'Destinasi Hotel berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'JamBuka' => 'nullable|string',
            'Deskripsi' => 'nullable|string',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Format dan ukuran gambar sampul yang diizinkan
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Format dan ukuran gambar yang diizinkan
        ]);

        // Find the destination by ID
        $destination = Destinasi::find($id);

        // Update the destination data
        $destination->nama = $request->input('nama');
        $destination->alamat = $request->input('alamat');
        $destination->latitude = $request->input('latitude');
        $destination->longitude = $request->input('longitude');
        $destination->JamBuka = $request->input('JamBuka');
        $destination->Deskripsi = $request->input('Deskripsi');

        // Process and update the uploaded images
        if ($request->hasFile('sampul')) {
            // Hapus sampul lama sebelum menyimpan sampul baru (optional)
            if ($destination->sampul) {
                Storage::disk('public')->delete($destination->sampul);
            }

            // Simpan sampul ke dalam penyimpanan (misalnya folder public/images)
            $sampulPath = $request->file('sampul')->store('images', 'public');
            // Simpan path sampul baru di kolom "sampul" pada tabel
            $destination->sampul = $sampulPath;
        }

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama sebelum menyimpan gambar baru (optional)
            if (!empty($destination->gambar)) {
                // Hapus gambar lama dari penyimpanan
                $oldImages = json_decode($destination->gambar, true);
                foreach ($oldImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
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

        // Redirect to the index page with a success message if everything is fine
        return redirect()
            ->route('destinasi-hotel.index')
            ->with('success', 'Destinasi Hotel berhasil diupdate.');
    }
}
