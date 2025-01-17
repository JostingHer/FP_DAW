<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/allUsers', [UsuarioController::class, 'allData']);


Route::get('/holamundo', function () {
    return "hola mundo page";
});


// Route::get('/holamundo/{persona}/{tipo}', function ($persona, $tipo) {
//     return "hola " . $persona . $tipo;
// });
 

// esta mal revisar
Route::get('/holamundo/{persona}/{rol?}', function ($persona, $rol = null) {

    if($rol == null){
            return "hola persona sin rol";
    }else{
        return "hola " . $persona . "de rol" .$rol;
    }

}) -> where('persona', '[a-z]+');


Route::get('/users/{name}/{rol?}', [UserController::class, 'saludoPersona']);


Route::get('/usersBlade/{name}/{rol?}', [UserController::class, 'saludoPersonaBlade'])-> where('name
', '[a-z]+');

Route::get('/usersBlade', [UserController::class, 'saludandoPersonas']);



