<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RegisterUser;
use App\Models\Bitacora;
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
//Route::resource('user', RegisterUser::class)->middleware('auth');
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    
    //inicio
    Route::get('/home', [BitacoraController::class, 'index'])->name('home');
    Route::get('/', [BitacoraController::class, 'index'])->name('home');
    
    //Bitacoras
    Route::get('/bitacora', [BitacoraController::class, 'bitacora'])->name('bitacora');
    Route::get('/alertas',[BitacoraController::class,'alertas'])->name('alertas');
    Route::get('/reportes',[BitacoraController::class,'reportes'])->name('reportes');

    //Usuarios
    
    
    Route::get('/user',[RegisterUser::class,'index'])->name('user');
    Route::get('user/create',[RegisterUser::class,'create'])->name('user.create');

    Route::post('/register',[RegisterUser::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit',[RegisterUser::class, 'edit'])->name('user.edit');
    Route::patch('user/{id}',[RegisterUser::class, 'update'])->name('user.update');
    Route::post('/user/{id}',[RegisterUser::class, 'destroy'])->name('user.destroy');

    //creditos/{id}/edit/{val}


    
    
    
    

});

//PDF Dom
Route::get('/pdf',[PDFController::class,'PDF'])->name('descargarpdf');

Route::get('/report',[PDFController::class,'PDFBitacora'])->name('PDFBitacorareporte');

