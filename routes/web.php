<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DestinoController;
use App\Http\Controllers\ProductoController;

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

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('categorías');
    } else {
        return redirect()->route('login');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
   // Rutas para productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/crear-producto', [ProductoController::class, 'create'])->name('producto.create');
Route::post('/producto-store', [ProductoController::class, 'store'])->name('producto.store');
Route::get('/editar-producto/{producto}', [ProductoController::class, 'edit'])->name('producto.edit');
Route::put('/producto-update/{producto}', [ProductoController::class, 'update'])->name('producto.update');
Route::get('/detalles-producto/{producto}', [ProductoController::class, 'show'])->name('producto.show');
Route::delete('/eliminar-producto/{producto}', [ProductoController::class, 'destroy'])->name('producto.destroy');
    
// Rutas para categorias
Route::get('/categorías', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/crear-categoría', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoría-store', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/editar-categoría/{categoria}', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('/categoría-update/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::get('/detalles-categoría/{categoria}', [CategoriaController::class, 'show'])->name('categoria.show');
Route::delete('/eliminar-categoría/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

// Rutas para destinos
Route::get('/destinos', [DestinoController::class, 'index'])->name('destinos.index');
Route::get('/crear-destino', [DestinoController::class, 'create'])->name('destino.create');
Route::post('/destino-store', [DestinoController::class, 'store'])->name('destino.store');
Route::get('/editar-destino/{destino}', [DestinoController::class, 'edit'])->name('destino.edit');
Route::put('/destino-update/{destino}', [DestinoController::class, 'update'])->name('destino.update');
Route::get('/detalles-destino/{destino}', [DestinoController::class, 'show'])->name('destino.show');
Route::delete('/eliminar-destino/{destino}', [DestinoController::class, 'destroy'])->name('destino.destroy');
});



