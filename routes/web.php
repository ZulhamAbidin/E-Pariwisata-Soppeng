<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinasiWisataController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/destinasi-wisata', [DestinasiWisataController::class, 'index'])->name('destinasi-wisata.index');
Route::get('/destinasi-wisata/create', [DestinasiWisataController::class, 'create'])->name('destinasi-wisata.create');
Route::post('/destinasi-wisata', [DestinasiWisataController::class, 'store'])->name('destinasi-wisata.store');
Route::get('/destinasi-wisata/{id}', [DestinasiWisataController::class, 'show'])->name('destinasi-wisata.show');

require __DIR__.'/auth.php';
