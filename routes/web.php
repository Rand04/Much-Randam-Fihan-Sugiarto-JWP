<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaintController;
use App\Models\Paint;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {

    $total = Paint::count();
    $terlaris = Paint::orderBy('terjual','desc')->first();
    $rata = Paint::avg('terjual');

    // 🔥 TAMBAHAN UNTUK GRAFIK
    $labels = Paint::pluck('nama_cat');
    $data = Paint::pluck('terjual');

        // 🔥 TAMBAHAN INSIGHT
    $termurah = Paint::orderBy('harga','asc')->first();
    $premiumCount = Paint::where('kualitas','premium')->count();

    return view('dashboard', compact(
        'total',
        'terlaris',
        'rata',
        'labels',
        'data',
        'termurah',
        'premiumCount'
    ));

})->middleware('auth')->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('paints', PaintController::class);
});

Route::get('/rekomendasi', [PaintController::class, 'rekomendasi'])
    ->middleware('auth')
    ->name('rekomendasi');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
