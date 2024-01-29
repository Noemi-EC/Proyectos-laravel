<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\VoluntarioController;
use App\Models\Mascota;
use App\Models\Voluntario;

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
    $mascotas = Mascota::paginate(10);
    $voluntarios = Voluntario::paginate(10);
    return view('welcome', compact('mascotas', 'voluntarios'));
    // return view('welcome');
});

Route::resource('voluntario', VoluntarioController::class);

Route::resource('mascota', MascotaController::class);
// verifica si el usuario está autenticado para poder ingresar a las rutas mencionadas
// Route::middleware('auth')->group(function () {
//     Route::get('/mascota', [MascotaController::class, 'edit'])->name('mascota.edit');
//     Route::patch('/mascota', [MascotaController::class, 'update'])->name('mascota.update');
//     Route::delete('/mascota', [MascotaController::class, 'destroy'])->name('mascota.destroy');
//     Route::get('/mascota', [MascotaController::class, 'index'])->name('mascota.index');
    // Route::get('/mascota', [MascotaController::class, 'create'])->name('mascota.create');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
