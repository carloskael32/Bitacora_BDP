<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RegisterUser;
use App\Models\Bitacora;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\eno\EnoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GeneradorController;

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

/*
Route::get('/', function () {
    return view('user.login');
});
*/


Route::get('/', function () {
    return view('login.login');
});


Route::get('/home', function () {
    return view('login.login');
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
//Route::resource('user', RegisterUser::class)->middleware('auth');

//Auth::routes();

//login
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])->name('logout.destroy')->middleware('auth');
Route::get('/login', [SessionsController::class, 'index'])->name('login.index')->middleware('guest');

Route::group(['middleware' => 'auth'], function () {


    //inicio
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index'])->name('home');

    //Bitacoras
    Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora');
    Route::get('/alertas', [BitacoraController::class, 'alertas'])->name('alertas');
    Route::get('/reportes', [BitacoraController::class, 'reportes'])->name('reportes');


    //Encargados Operativos
    Route::get('/eno', [EnoController::class, 'index'])->name('eno')->middleware('admin');
    Route::get('eno/create', [EnoController::class, 'create'])->name('eno.create');
    Route::post('/registereno', [EnoController::class, 'store'])->name('eno.store');
    Route::get('/eno/{id}/edit', [EnoController::class, 'edit'])->name('eno.edit');
    Route::patch('eno/{id}', [EnoController::class, 'update'])->name('eno.update');
    Route::post('/eno/{id}', [EnoController::class, 'destroy'])->name('eno.destroy');


  

    //Administradores
    Route::get('/user', [RegisterUser::class, 'index'])->name('user')->middleware('admin');
    Route::get('user/create', [RegisterUser::class, 'create'])->name('user.create');
    Route::post('/registeruser', [RegisterUser::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [RegisterUser::class, 'edit'])->name('user.edit');
    Route::patch('user/{id}', [RegisterUser::class, 'update'])->name('user.update');
    Route::post('/user/{id}', [RegisterUser::class, 'destroy'])->name('user.destroy');


    //Generadores
    Route::get('/generador',[GeneradorController::class,'index'])->name('generador');
    Route::get('generador/create',[GeneradorController::class,'create'])->name('generador.create');
    Route::post('/registergen',[GeneradorController::class,'store'])->name('generador.store');
    Route::get('/generador/{id}/edit', [GeneradorController::class, 'edit'])->name('generador.edit');
    Route::patch('generador/{id}', [GeneradorController::class, 'update'])->name('generador.update');
    Route::post('/generador/{id}', [GeneradorController::class, 'destroy'])->name('generador.destroy');
    

    

});

//PDF Dom
//Route::get('/pdf', [PDFController::class, 'PDF'])->name('descargarpdf');

Route::get('/reportBit', [PDFController::class, 'PDFBit'])->name('reportBit');

Route::get('/report', [PDFController::class, 'PDFBitacora'])->name('PDFBitacorareporte');

Route::get('/report2', [PDFController::class, 'PDFBitacora2'])->name('PDFBitacorareporte2');

Route::get('/reportAlert', [PDFController::class, 'PDFAlertas'])->name('reportAlert');
