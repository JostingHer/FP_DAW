<?php

use App\Http\Controllers\CompanyDeliveryController;
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

Route::get('/random/{num1}/{num2}', [CompanyDeliveryController::class, 'random']);

Route::get('/empresa', [CompanyDeliveryController::class, 'index']);

Route::post('/empresa', [CompanyDeliveryController::class, 'store']);

Route::get('/empresa/{id}', [CompanyDeliveryController::class, 'show']);

Route::put('/empresa/{id}', [CompanyDeliveryController::class, 'update']);

Route::delete('/empresa/{id}', [CompanyDeliveryController::class, 'destroy']);

Route::fallback ( function () {
   
    return response()->json(['error' => 'No encontrado'], 404);
    });