<?php

use App\Http\Controllers\BlogController;
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


Route::get('/posts', [BlogController::class, 'index'])->name('posts.index'); // Listado de productos

Route::get('/posts/create', [BlogController::class, 'create'])->name('posts.create'); // Formulario de creación
Route::post('/posts', [BlogController::class, 'store'])->name('posts.store'); // Guardar nuevo producto
Route::get('/posts/{id}', [BlogController::class, 'show'])->name('posts.show'); // Mostrar un producto
Route::get('/posts/{id}/edit', [BlogController::class, 'edit'])->name('posts.edit'); // Formulario de edición
Route::put('/posts/{id}', [BlogController::class, 'update'])->name('posts.update'); // Guardar edición
Route::delete('/posts/{id}', [BlogController::class, 'destroy'])->name('posts.destroy'); // Eliminar producto
 


