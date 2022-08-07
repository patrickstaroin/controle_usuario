<?php

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
use App\Http\Controllers\UsuarioController;

Route::get('/', [UsuarioController::class, 'index'])->middleware('auth');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->middleware('auth');
Route::get('/usuarios/{id}', [UsuarioController::class, 'edit'])->middleware('auth');
Route::post('/usuarios', [UsuarioController::class, 'store'])->middleware('auth');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->middleware('auth');
Route::put('/usuarios/update/{id}', [UsuarioController::class, 'update'])->middleware('auth');
Route::get('/produtos', [UsuarioController::class, 'showProdutos'])->middleware('auth');
Route::get('/categorias', [UsuarioController::class, 'showCategorias'])->middleware('auth');
Route::get('/marcas', [UsuarioController::class, 'showMarcas'])->middleware('auth');






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
