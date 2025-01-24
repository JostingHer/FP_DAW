<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PedidoController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/usuarios', [UsuarioController::class,'indice'])->name('rutaIndiceUsuario');

Route::get('/usuarios/nuevoUsuario', [UsuarioController::class,'nuevoUsuario'])->name('rutaNuevoUsuario');

Route::post('/usuarios/add', [UsuarioController::class,'add'])->name('rutaAddUsuario');

Route::get('/usuarios/actualizarUsuario/{id}', [UsuarioController::class,'actualizarUsuario'])->name('rutaActualizarUsuario');

Route::post('/usuarios/update', [UsuarioController::class,'update'])->name('rutaUpdateUsuario');

Route::get('/usuarios/delete/{id}', [UsuarioController::class,'delete'])->name('rutaBorrarUsuario');



////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/productos', [ProductoController::class,'indice']);

Route::get('/pedidos', [PedidoController::class,'indice']);

Route::get('/saludo', [UsuarioController::class,'saludo']);

Route::get('/saludo/{persona}/{rol?}', [UsuarioController::class,'saludoPersona'])->where('persona', '[a-z]+');

Route::get('/saludoTodos', [UsuarioController::class,'saludoTodasPersonas']);




