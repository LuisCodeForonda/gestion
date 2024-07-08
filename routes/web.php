<?php

use App\Http\Controllers\AccesorioController;
use App\Http\Controllers\AccionController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PersonaController;
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
    Route::get('', [HomeController::class, 'index'])->middleware(['auth', 'can:dahsboard.index'])->name('dashboard');
    Route::get('marca/pdf', [MarcaController::class, 'pdf'])->name('marca.pdf')->middleware('auth');
    Route::resource('marca', MarcaController::class)->middleware('auth');
    Route::get('equipo/pdf/{equipo?}', [EquipoController::class, 'pdf'])->name('equipo.pdf')->middleware('auth');
    Route::resource('equipo', EquipoController::class)->middleware('auth');
    
    //Route::resource('accesorio', AccesorioController::class)->middleware('auth');
    Route::get('/accesorio', [AccesorioController::class, 'index'])->name('accesorio.index')->middleware(['auth', 'permission:dahsboard.accesorio.index']);
    Route::post('/accesorio', [AccesorioController::class, 'store'])->name('accesorio.store')->middleware(['auth', 'permission:dahsboard.accesorio.create']);
    Route::get('/accesorio/create/{equipo?}', [AccesorioController::class, 'create'])->name('accesorio.create')->middleware(['auth', 'permission:dahsboard.accesorio.create']);
    Route::get('/accesorio/{accesorio}', [AccesorioController::class, 'show'])->name('accesorio.show')->middleware(['auth']);
    Route::put('/accesorio/{accesorio}', [AccesorioController::class, 'update'])->name('accesorio.update')->middleware(['auth', 'permission:dahsboard.accesorio.edit']);
    Route::delete('/accesorio/{accesorio}', [AccesorioController::class, 'destroy'])->name('accesorio.destroy')->middleware(['auth', 'permission:dahsboard.accesorio.destroy']);
    Route::get('/accesorio/{accesorio}/edit/{equipo?}', [AccesorioController::class, 'edit'])->name('accesorio.edit')->middleware(['auth', 'permission:dahsboard.accesorio.edit']);
    
    //Route::resource('/accion', AccionController::class)->middleware('auth');
    Route::get('/accion', [AccionController::class, 'index'])->name('accion.index')->middleware(['auth', 'permission:dahsboard.accion.index']);
    Route::post('/accion', [AccionController::class, 'store'])->name('accion.store')->middleware(['auth', 'permission:dahsboard.accion.create']);
    Route::get('/accion/create/{equipo?}', [AccionController::class, 'create'])->name('accion.create')->middleware(['auth', 'permission:dahsboard.accion.create']);
    Route::get('/accion/{accion}', [AccionController::class, 'show'])->name('accion.show')->middleware(['auth', '']);
    Route::put('/accion/{accion}', [AccionController::class, 'update'])->name('accion.update')->middleware(['auth', 'permission:dahsboard.accion.edit']);
    Route::delete('/accion/{accion}', [AccionController::class, 'destroy'])->name('accion.destroy')->middleware(['auth', 'permission:dahsboard.accion.destroy']);
    Route::get('/accion/{accion}/edit/{equipo?}', [AccionController::class, 'edit'])->name('accion.edit')->middleware(['auth', 'permission:dahsboard.accion.edit']);
    
    Route::get('usuario', [UserController::class, 'index'])->name('usuario.index')->middleware(['auth', 'permission:dahsboard.usuario.index']);
    Route::resource('rol', RolController::class)->middleware('auth');

    Route::get('persona/pdf', [PersonaController::class, 'pdf'])->name('persona.pdf')->middleware('auth');
    Route::get('/persona', [PersonaController::class, 'index'])->name('persona.index')->middleware('auth');;
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
