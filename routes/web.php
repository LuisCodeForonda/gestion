<?php

use App\Http\Controllers\AccesorioController;
use App\Http\Controllers\AccionController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
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

Route::prefix('/dashboard')->group(function () {
    Route::get('', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    Route::resource('marca', MarcaController::class)->middleware('auth');
    Route::resource('equipo', EquipoController::class)->middleware('auth');
    Route::resource('accesorio', AccesorioController::class)->middleware('auth');
    Route::resource('accion', AccionController::class)->middleware('auth');
    Route::resource('usuario', UserController::class)->middleware('auth');
    Route::resource('rol', RolController::class)->middleware('auth');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
