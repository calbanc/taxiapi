<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\unidadesController;
use App\Http\Controllers\viajesController;

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

Route::get('api/unidades/index',[unidadesController::class,'index']);

Route::post('api/unidades/getbyid',[unidadesController::class,'getbyid']);
Route::post('api/unidades/getbydni',[unidadesController::class,'getbydni']);
Route::post('api/unidades/getbyplaca',[unidadesController::class,'getbyplaca']);
Route::post('api/unidades/desactivarunidad',[unidadesController::class,'desactivarunidad']);
Route::post('api/unidades/activarunidad',[unidadesController::class,'activarunidad']);
Route::post('api/unidades/eliminar',[unidadesController::class,'eliminaunidad']);


Route::get('api/viajes/index',[viajesController::class,'index']);
Route::post('api/viajes/searchbyfecha',[viajesController::class,'searchbyfecha']);