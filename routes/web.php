<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\JardinesController;
use App\Http\Controllers\BombaController;
use App\Http\Controllers\HumedadController;
use App\Http\Controllers\MacetaController;

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


Route::post('/login', [AuthController::class, 'iniciarSesion'])->name('signIn');
Route::post('/signup', [AuthController::class, 'registrar'])->name('signUp');
Route::get('/auth/login', [AuthController::class, 'index'])->name('login');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/jardines', [JardinesController::class, 'index']);
    Route::get('/logout', [DashboardController::class, 'logout']);

    Route::get('/historico', [MacetaController::class, 'historico']);
    Route::get('/agregar', [MacetaController::class, 'index']);
    Route::post('/nuevaMaceta', [MacetaController::class, 'registrarMaceta'])->name('nuevaMaceta');
    Route::get('/getRegistros', [MacetaController::class, 'getRegistros'])->name('getHistorico');
    Route::post('/infoMaceta', [MacetaController::class, 'getInfo'])->name('getInfoMaceta');
    Route::get('/perfil', [PerfilController::class, 'index']);
    Route::post('/updatePhoto', [PerfilController::class, 'changePhoto'])->name('updatePhoto');
    Route::post('/changeDataUser', [PerfilController::class, 'changeDataUser'])->name('updateUser');

    // IoT
    Route::post('/stateBomba', [BombaController::class, 'stateBomba'])->name('state.bomba');
    Route::post('/humMax', [HumedadController::class, 'setHumMax'])->name('humMax');
    Route::post('humedadActual', [HumedadController::class, 'verHumedadAct'])->name('humedadAct');
});
