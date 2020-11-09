<?php

use App\Http\Controllers\JerarquiaController;
use App\Http\Controllers\MiembrosController;
use App\Models\Miembro;
use App\Models\Movimiento;
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

Route::get('/', function () { return view('welcome/welcome'); })->name('welcome');

Route::match(['put', 'patch'], '/admin/{movimiento}', [JerarquiaController::class, 'edit'])->name('admin.edit');

Route::get('/miembros', [MiembrosController::class, 'index'])->name('miembros.index');
Route::post('/miembros', [MiembrosController::class, 'create'])->name('miembros.create');
Route::match(['put', 'patch'], '/miembros', [MiembrosController::class, 'edit'])->name('miembros.edit');

Route::get('/movimiento/{movimiento?}', [JerarquiaController::class, 'adminIndex'])->name('admin');
Route::delete('/miembros/{miembro}', [MiembrosController::class, 'delete'])->name('miembros.destroy');


Route::post('/movimiento', [JerarquiaController::class, 'crearMovimiento'])->name('movimiento.create');

Route::get('/jerarquia', [JerarquiaController::class, 'index'])->name('jerarquia.index');
Route::put('/jerarquia/', [JerarquiaController::class, 'crearGrupo'])->name('jerarquia.crearGrupo');
Route::put('/jerarquia/{nivelJerarquico}', [JerarquiaController::class, 'crearNivelPadre'])->name('jerarquia.crearNivelJerarquico');
Route::delete('/jerarquia/{nivelJerarquico}', [JerarquiaController::class, 'delete'])->name('jerarquia.destroy');
Route::get('/jerarquia/{nivelJerarquico}/miembros', [JerarquiaController::class, 'verMiembros'])->name('jerarquia.miembros');

Route::get('/prueba', function () { return view('admin.jerarquia.edit-miembros', ["miembros" => Miembro::all()]); })->name('jerarquia.editMiembro');
Route::get('/movimientos', function () { return view('admin.movimientos-catalog', ['movimientos' => Movimiento::all()]); })->name('movimientos.index');


Route::get('/pruebaRoles', function () {
    session('movimiento')->gestorJerarquia()->obtenerMiembros(58);
});

Route::get('/pruebaNoAsignados', function () {
    $miembros = session('movimiento')->gestorJerarquia()->obtenerMiembros(58);
    return session('movimiento')->gestorJerarquia()->obtenerMiembrosNoAsignados($miembros);
});

Route::get('/pruebaRolesMiembro', function () {
    return session('movimiento')->gestorMiembros()->posicionMiembroJerarquia(Miembro::where(['componente_id'=>15])->first());
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
