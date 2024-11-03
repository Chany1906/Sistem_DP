<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ImagenProductoController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('productos', ProductoController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('tiendas', TiendaController::class);
Route::resource('asignaciones', AsignacionController::class);
Route::resource('categorias', CategoriaController::class);
Route::post('/productos/import', [ProductoController::class, 'import'])->name('productos.import');

Route::get('/imagenes', [ImagenProductoController::class, 'index'])->name('imagenes.index');
Route::get('/imagenes/create', [ImagenProductoController::class, 'create'])->name('imagenes.create');
Route::post('/imagenes', [ImagenProductoController::class, 'store'])->name('imagenes.store');
Route::delete('/imagenes/{imagen}', [ImagenProductoController::class, 'destroy'])->name('imagenes.destroy');
Route::delete('/imagenes/producto/{codigo_interno}', [ImagenProductoController::class, 'destroyAll'])->name('imagenes.destroyAll');
