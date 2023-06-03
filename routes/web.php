<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Mostrar formulario de creación de citas
Route::get('/citas/crear', [CitaController::class, 'create'])->name('citas.create')->middleware('auth');

// Procesar datos del formulario y guardar la cita
Route::post('/citas', [CitaController::class, 'store'])->name('citas.store')->middleware('auth');

//Mostrar citas
Route::get('/citas/resultados', [CitaController::class, 'showResults'])->name('citas.resultados')->middleware('auth');

//Editar citas
Route::get('/citas/{cita}/editar', [CitaController::class, 'edit'])->name('citas.edit')->middleware('auth');
Route::put('/citas/{cita}', [CitaController::class, 'update'])->name('citas.update')->middleware('auth');

//Eliminar cita
Route::delete('/citas/{cita}', [CitaController::class, 'destroy'])->name('citas.destroy')->middleware('auth');


require __DIR__.'/auth.php';
