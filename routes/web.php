<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\ModelsController;
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
    Route::prefix('marcas')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('marcas');
        Route::get('/nova', [BrandController::class, 'create']);
        Route::post('/nova', [BrandController::class, 'store'])->name('criar_marca');
    });

    //Route::get('/modelos/novo', [ModelsController::class, 'index']);

    Route::prefix('modelos')->group(function () {
        Route::get('/novo', [ModelsController::class, 'create']);
        Route::post('/novo', [ModelsController::class, 'store'])->name('criar_modelo');
    });

    Route::prefix('veiculos')->group(function () {
        Route::get('/', [VeiculoController::class, 'index'])->name('veiculos.list');
        Route::get('/editar/{id}', [VeiculoController::class, 'show']);
        Route::post('/editar/{id}', [VeiculoController::class, 'update'])->name('atualizar_veiculo');
        Route::get('/novo', [VeiculoController::class, 'getBrandsAndModels']);
        Route::post('/novo', [VeiculoController::class, 'store'])->name('criar_veiculo');
        Route::delete('/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
