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
Route::get('/destinasi-wisata/{id}/edit', [DestinasiWisataController::class, 'edit'])->name('destinasi-wisata.edit');
Route::delete('/destinasi-wisata/{id}', [DestinasiWisataController::class, 'destroy'])->name('destinasi-wisata.destroy');
Route::put('/destinasi-wisata/{id}', [DestinasiWisataController::class, 'update'])->name('destinasi-wisata.update');


require __DIR__.'/auth.php';
