<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Models\DeskripsiKabupaten;
use App\Models\Destinasi;
use Illuminate\Database\Eloquent\Collection;

class RootController extends Controller
{
    // public function index()
    // {
    //     $data = DeskripsiKabupaten::all();

    //     return view('welcome', compact('posts', 'data'));
    // }
    public function index()
    {
        $data = DeskripsiKabupaten::all();

        // Ambil 2 destinasi dengan rating rata-rata tertinggi
        $topRatedDestinations = Destinasi::with('komentars')
            ->withAvg('komentars', 'rating')
            ->orderByDesc('komentars_avg_rating')
            ->limit(4)
            ->get();

        return view('welcome', compact('data', 'topRatedDestinations'));
    }

    public function cari(Request $request)
    {
        $keyword = $request->input('search'); // Ambil keyword pencarian dari input form

        $posts = Destinasi::where('nama', 'like', '%' . $keyword . '%')
            ->orWhere('alamat', 'like', '%' . $keyword . '%')
            ->orWhere('HargaTiket', 'like', '%' . $keyword . '%')
            ->orWhere('FasilitasDestinasi', 'like', '%' . $keyword . '%')
            ->orWhere('JamBuka', 'like', '%' . $keyword . '%')
            ->orWhere('Deskripsi', 'like', '%' . $keyword . '%')
            ->orWhere('Sejarah', 'like', '%' . $keyword . '%')
            ->orWhere('MenuKuliner', 'like', '%' . $keyword . '%')
            ->orWhere('kategori', 'like', '%' . $keyword . '%')
            ->get();

        $noResults = $posts->isEmpty(); // Cek apakah tidak ada hasil

        return view('postingan.semua-postingan', compact('posts', 'keyword', 'noResults'));
    }

    public function show(Destinasi $destination)
    {
        return view('postingan.detail', compact('destination'));
    }

    public function showAllPosts()
    {
        $posts = Destinasi::all(); // Ganti 'Postingan' dengan model yang sesuai

        return view('postingan.semua-postingan', compact('posts'));
    }
}
