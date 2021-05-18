<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpresaController;
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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/empresas', [EmpresaController::class, 'index'])->name('indexEmpresa');

    Route::get('/empresa/create', [EmpresaController::class, 'create'])->name('createEmpresa');

    Route::post('/empresa/create', [EmpresaController::class, 'store'])->name('addEmpresa');

    Route::get('/empresa/edit/{id}', [EmpresaController::class, 'edit'])->name('editEmpresa');

    Route::put('/empresa/edit/{id}', [EmpresaController::class, 'update'])->name('updateEmpresa');

    Route::delete('/empresa/delete/{id}', [EmpresaController::class, 'destroy'])->name('deleteEmpresa');

    Route::get('/empleados', [EmpleadoController::class, 'index'])->name('indexEmpleado');

    Route::get('/empleado/create', [EmpleadoController::class, 'create'])->name('createEmpleado');

    Route::post('/empleado/create', [EmpleadoController::class, 'store'])->name('addEmpleado');

    Route::get('/empleado/edit/{id}', [EmpleadoController::class, 'edit'])->name('editEmpleado');

    Route::put('/empleado/edit/{id}', [EmpleadoController::class, 'update'])->name('updateEmpleado');

    Route::delete('/empleado/delete/{id}', [EmpleadoController::class, 'destroy'])->name('deleteEmpleado');
});


require __DIR__ . '/auth.php';
