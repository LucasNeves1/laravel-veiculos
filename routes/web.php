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
        Route::get('/', [BrandController::class, 'index'])->name('brand.list');
        Route::get('/editar/{brand}', [BrandController::class, 'show']);
        Route::put('/editar/{brand}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('/nova', [BrandController::class, 'create']);
        Route::post('/nova', [BrandController::class, 'store'])->name('brand.create');
        Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });

    //Route::get('/modelos/novo', [ModelsController::class, 'index']);

    Route::prefix('modelos')->group(function () {
        Route::get('/', [ModelsController::class, 'index'])->name('model.list');
        Route::get('/novo', [ModelsController::class, 'create']);
        Route::post('/novo', [ModelsController::class, 'store'])->name('model.create');
        Route::get('/editar/{modelo}', [ModelsController::class, 'show']);
        Route::put('/editar/{modelo}', [ModelsController::class, 'update'])->name('model.update');
        Route::delete('/{modelo}', [ModelsController::class, 'destroy'])->name('model.destroy');
    });

    Route::prefix('veiculos')->group(function () {
        Route::get('/', [VeiculoController::class, 'index'])->name('vehicle.list');
        Route::get('/editar/{veiculo}', [VeiculoController::class, 'show']);
        Route::put('/editar/{veiculo}', [VeiculoController::class, 'update'])->name('vehicle.update');
        Route::get('/novo', [VeiculoController::class, 'getBrandsAndModels']);
        Route::post('/novo', [VeiculoController::class, 'store'])->name('vehicle.create');
        Route::delete('/{veiculo}', [VeiculoController::class, 'destroy'])->name('vehicle.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
