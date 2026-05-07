<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideojocController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

// rutes publiques
Route::get('/videojocs', [VideojocController::class, 'index'])->name('videojocs.index');

// rutes estatiques i privades
Route::get('/videojocs/create', [VideojocController::class, 'create'])->middleware('auth')->name('videojocs.create');
Route::post('/videojocs', [VideojocController::class, 'store'])->middleware('auth')->name('videojocs.store');

// rutes amb parametres
Route::get('/videojocs/{videojoc}', [VideojocController::class, 'show'])->name('videojocs.show');
Route::get('/videojocs/{videojoc}/edit', [VideojocController::class, 'edit'])->middleware('auth')->name('videojocs.edit');
Route::put('/videojocs/{videojoc}', [VideojocController::class, 'update'])->middleware('auth')->name('videojocs.update');
Route::delete('/videojocs/{videojoc}', [VideojocController::class, 'destroy'])->middleware('auth')->name('videojocs.destroy');

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
