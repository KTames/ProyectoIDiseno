<?php

use App\Http\Controllers\JerarquiaController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
