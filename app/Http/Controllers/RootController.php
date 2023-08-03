<?php

// app/Http/Controllers/DeskripsiKabupatenController.php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Kebudayaan;
use Illuminate\Http\Request;
use App\Models\DestinasiHotel;
use App\Models\DestinasiWisata;
use App\Models\DestinasiKuliner;
use App\Models\DeskripsiKabupaten;

class RootController extends Controller
{
    // public function index()
    // {
    //     $data = DeskripsiKabupaten::all();
    //     return view('welcome', compact('data'));

        
    // }

    // public function index()
    // {
    //     $data = DeskripsiKabupaten::all();
        
    //     $posts = Komentar::with(['destinasiWisata', 'destinasiKuliner', 'destinasiHotel', 'kebudayaan'])
    //         ->orderByDesc('rating')
    //         ->get();

    //     return view('welcome', compact('data', 'posts'));
    // }

    public function index()
    {

        $data = DeskripsiKabupaten::all();
        // Mengambil data dari masing-masing tabel dengan rating tertinggi
        $kebudayaanPosts = Kebudayaan::with('komentars')
            ->orderByDesc('rating')
            ->take(4)
            ->get();

        $wisataPosts = DestinasiWisata::with('komentars')
            ->orderByDesc('rating')
            ->take(4)
            ->get();

        $kulinerPosts = DestinasiKuliner::with('komentars')
            ->orderByDesc('rating')
            ->take(4)
            ->get();

        $hotelPosts = DestinasiHotel::with('komentars')
            ->orderByDesc('rating')
            ->take(4)
            ->get();

        // Menggabungkan semua data menjadi satu array
        $posts = $kebudayaanPosts
            ->merge($wisataPosts)
            ->merge($kulinerPosts)
            ->merge($hotelPosts);

        // Mengurutkan array berdasarkan rating secara descending
        $posts = $posts->sortByDesc('rating');

        return view('welcome', compact('posts', 'data'));
    }
    
}
