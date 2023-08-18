<?php

namespace App\Http\Controllers;

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\Kebudayaan;

class DashboardController extends Controller
{
    public function index()
    {
        // // Mengambil data destinasi wisata
        // $destinasiWisata = Destinasi::all();
        // $totalDestinasiWisata = $destinasiWisata->count();

        // // Mengambil data destinasi kuliner
        // $destinasiKuliner = Destinasi::all();
        // $totalDestinasiKuliner = $destinasiKuliner->count();

        // // Mengambil data destinasi hotel
        // $destinasiHotel = Destinasi::all();
        // $totalDestinasiHotel = $destinasiHotel->count();

        // // Mengambil data kebudayaan
        // $kebudayaan = Destinasi::all();
        // $totalKebudayaan = $kebudayaan->count();

        // Mengambil data destinasi wisata
        $destinasiWisata = Destinasi::where('kategori', 'wisata')->get();
        $totalDestinasiWisata = $destinasiWisata->count();

        // Mengambil data destinasi kuliner
        $destinasiKuliner = Destinasi::where('kategori', 'kuliner')->get();
        $totalDestinasiKuliner = $destinasiKuliner->count();

        // Mengambil data destinasi hotel
        $destinasiHotel = Destinasi::where('kategori', 'hotel')->get();
        $totalDestinasiHotel = $destinasiHotel->count();

        // Mengambil data kebudayaan
        $kebudayaan = Destinasi::where('kategori', 'kebudayaan')->get();
        $totalKebudayaan = $kebudayaan->count();

        return view('dashboard', compact('destinasiWisata', 'totalDestinasiWisata', 'destinasiKuliner', 'totalDestinasiKuliner', 'destinasiHotel', 'totalDestinasiHotel', 'kebudayaan', 'totalKebudayaan'));
    }
}
