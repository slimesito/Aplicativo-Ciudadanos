<?php

use App\Http\Controllers\CiudadanoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/buscar', [CiudadanoController::class, 'search'] )->name('buscar');

Route::get('/registrar_ciudadano', [CiudadanoController::class, 'create'] )->name('registrar.ciudadano.view');
Route::post('/store', [CiudadanoController::class, 'store'])->name('registrar.ciudadano.store');

Route::get('editar_ciudadano/{id}', [CiudadanoController::class, 'edit'])->name('editar.ciudadano.view');
Route::put('update/{id}', [CiudadanoController::class, 'update'])->name('ciudadanos.update');