<?php

// app/Http/Controllers/DeskripsiKabupatenController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeskripsiKabupaten;

class RootController extends Controller
{
     public function index()
    {
        $data = DeskripsiKabupaten::all();
        return view('welcome', compact('data'));
    }

}
