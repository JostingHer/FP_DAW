<?php

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


Route::get('/holamundo', function () {
    return "hola mundo page";
});
 
Route::get('/holamundo/{persona}/{tipo}', function ($persona, $tipo) {
    return "hola " . $persona . $tipo;
});
 

// esta mal revisar
Route::get('/holamundo/{persona}/{rol?}', function ($persona, $rol) {

    if($rol != null){
            return "no tiene rol";
    }else{
        return "hola " . $persona . "de rol" .$rol;
    }

}) -> where('persona', '[a-z]+');



Route::get('/', [UserController::class, 'indice']);




