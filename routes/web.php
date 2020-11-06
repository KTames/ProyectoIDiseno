<?php

use App\Http\Controllers\JerarquiaController;
use App\Http\Controllers\MiembrosController;
use App\Models\Miembro;
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

Route::get('/admin', [JerarquiaController::class, 'adminIndex'])->name('admin');
Route::match(['put', 'patch'], '/admin/{movimiento}', [JerarquiaController::class, 'edit'])->name('admin.edit');

Route::get('/miembros', [MiembrosController::class, 'index'])->name('miembros.index');

Route::delete('/miembros/{miembro}', [MiembrosController::class, 'delete'])->name('miembros.destroy');

Route::get('/jerarquia', [JerarquiaController::class, 'index'])->name('jerarquia.index');

Route::get('/prueba', function () { return view('admin.jerarquia.edit-miembros', ["miembros" => Miembro::all()]); })->name('jerarquia.editMiembro');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
