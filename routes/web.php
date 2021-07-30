<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitacoraController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

/*

// rutas de bitacora directamente a views
Route::get('/bitacora', function () {
    return view('bitacora.index');
});
 
// rutas mediante el controlador a una clase
Route::get('/bitacora/create',[BitacoraController::class,'create']);
*/

// rutas mediante controlador a todas las clases
Route::resource('bitacora', BitacoraController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [BitacoraController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [BitacoraController::class, 'index'])->name('home');
});
