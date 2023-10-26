<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

# Routes agrupas e protegidas pelo middleware auth -> Só disponiveis com um user autenticado
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('user', function() {
        return 'user';
    });
});

# Routes agrupadas e protegidas pelo middleware admin -> Só disponiveis para utilizadores autenticados com utype ADM
Route::middleware('admin')->group( function() {
    Route::get('admin', function() {
        return 'admin';
    });
});

require __DIR__.'/auth.php';
