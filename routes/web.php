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
Route::get('/productos', [ProductosController::class, 'index']);
Route::get('/facturas', [FacturasController::class, 'index']);
Route::get('/detalles', [DetallesController::class, 'index']);
