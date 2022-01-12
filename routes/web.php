<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\DetallesController;



use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});



Route::get('/clientes', [ClientesController::class, 'index']);
Route::get('/clientes/index', [ClientesController::class, 'index']);
Route::get('/clientes/create', [ClientesController::class, 'create']);
Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{id}/edit', [ClientesController::class, 'edit']);
Route::delete('/clientes/{id}', [ClientesController::class, 'destroy']);
Route::put('/clientes/{id}', [ClientesController::class, 'update'])->name('clientes.update');
Route::get('/clientes/criterios/{id}', [ClientesController::class, 'criterios']);

Route::get('/productos', [ProductosController::class, 'index']);
Route::get('/productos/index', [ProductosController::class, 'index']);
Route::get('/productos/create', [ProductosController::class, 'create']);
Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/{id}/edit', [ProductosController::class, 'edit']);
Route::delete('/productos/{id}', [ProductosController::class, 'destroy']);
Route::put('/productos/{id}', [ProductosController::class, 'update'])->name('productos.update');
Route::get('/productos/criterios/{id}', [ProductosController::class, 'criterios']);

Route::get('/facturas', [FacturasController::class, 'index']);
Route::get('/facturas/index', [FacturasController::class, 'index']);
Route::get('/facturas/create', [FacturasController::class, 'create']);
Route::post('/facturas', [FacturasController::class, 'store'])->name('facturas.store');
Route::get('/facturas/{id}/edit', [FacturasController::class, 'edit']);
Route::delete('/facturas/{id}', [FacturasController::class, 'destroy']);
Route::put('/facturas/{id}', [FacturasController::class, 'update'])->name('facturas.update');
Route::get('/facturas/criterios/{id}', [FacturasController::class, 'criterios']);

Route::get('/detalles', [DetallesController::class, 'index']);
Route::get('/detalles/index', [DetallesController::class, 'index']);
Route::get('/detalles/create', [DetallesController::class, 'create']);
Route::post('/detalles', [DetallesController::class, 'store'])->name('detalles.store');
Route::get('/detalles/{id}/edit', [DetallesController::class, 'edit']);
Route::delete('/detalles/{id}', [DetallesController::class, 'destroy']);
Route::put('/detalles/{id}', [DetallesController::class, 'update'])->name('detalles.update');
Route::get('/detalles/criterios/{id}', [DetallesController::class, 'criterios']);


//Route::get('/emple/{id}', [EmpleController::class, 'show'])->where('id', '[0-9]+');
