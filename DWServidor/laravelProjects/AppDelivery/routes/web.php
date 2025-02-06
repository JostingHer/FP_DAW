<?php

use App\Http\Controllers\CartShopController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Company;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/cart', [CartShopController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartShopController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartShopController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartShopController::class, 'clear'])->name('cart.clear');
Route::get('/cart/increase/{productId}', [CartShopController::class, 'increase'])->name('cart.increase');
Route::get('/cart/decrease/{productId}', [CartShopController::class, 'decrease'])->name('cart.decrease');

Route::get('/formCustomer', function () {
    return view('formCustomer');
});






Route::get('/products', [ProductController::class, 'index'])->name('products.index'); // Mostrar lista
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // Formulario de creación
// Route::post('/products', [ProductController::class, 'store'])->name('products.store'); // Guardar nuevo producto
// Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show'); // Mostrar un producto
// Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Formulario de edición
// Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update'); // Guardar edición
// Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); // Eliminar producto



Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index'); // Mostrar lista
// Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create'); // Formulario de creación
// Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store'); // agregar nuevo
// Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show'); // Mostrar uno
// Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit'); // Formulario de edición
// Route::put('/companies/{id}', [CompanyController::class, 'update'])->name('companies.update'); // Guardar edición
// Route::delete('/companies/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy'); // Eliminar 



Route::get('/{company}/products',  [ProductController::class, 'productsFilterByCompany'])
    ->name('products.productsFilterByCompany');



// ojo: aqui se modifican dos tablas order y product_order

Route::get('/{companies}/orders', [OrderController::class, 'index'])->name('orders.index'); // Mostrar lista
Route::get('/{companies}/create', [CompanyController::class, 'create'])->name('companies.create'); // Formulario de creación
// Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store'); // agregar nuevo
// Route::delete('/companies/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy'); // Eliminar 


// Route::post('/cart/add/{product}', function () {
//     return view('welcome');
// })->name('cart.add');
