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
            ->limit(2)
            ->get();

        return view('welcome', compact('data', 'topRatedDestinations'));
    }

    public function show(Destinasi $destination)
    {
        return view('postingan.detail', compact('destination'));
    }

//     public function showAllPosts()
// {
//     $posts = Destinasi::all(); // Ganti 'Postingan' dengan model yang sesuai

//     return view('semua-postingan', compact('posts'));
// }


}
