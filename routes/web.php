<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperadoresController;
use  App\Http\Controllers\TransporteController;
use App\Models\Cliente;
use App\Models\Operadores;

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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('index');
})->name('dashboard');


//clientes
Route::resource('clientes','App\Http\Controllers\ClienteController');
Route::get('/alta_cliente', function () {
    return view('clientes.create');
});
Route::get ('desactivarcliente/{id}',[ClienteController::class,'desactivarcliente'])->name('desactivarcliente');
Route::get ('activarcliente/{id}',[ClienteController::class,'activarcliente'])->name('activarcliente');
Route::get ('pdfclientes',[ClienteController::class,'pdfclientes'])->name('pdfclientes');
Route::get ('excelclientes',[ClienteController::class,'excelclientes'])->name('excelclientes');


//Operadores
Route::get('altaoperador',[OperadoresController::class,'altaoperador'])->name('operadores.altaoperador');
Route::post('guardaroperador',[OperadoresController::class,'guardaroperador'])->name('guardaroperador');
Route::get('reporteoperadores',[OperadoresController::class,'reporteoperadores'])->name('operadores.reporteoperadores');
Route::get ('desactivaoperador/{idoperador}',[OperadoresController::class,'desactivaoperador'])->name('desactivaoperador');
Route::get ('activaroperador/{idoperador}',[OperadoresController::class,'activaroperador'])->name('activaroperador');
Route::delete ('borraroperador/{idoperador}',[OperadoresController::class,'borraroperador'])->name('borraroperador');
Route::get ('modificaoperador/{idoperador}',[OperadoresController::class,'modificaoperador'])->name('operadores.modificaoperador');
Route::post ('guardarcambiosoperador',[OperadoresController::class,'guardarcambiosoperador'])->name('guardarcambiosoperador');
Route::get ('pdfoperadores',[OperadoresController::class,'pdfoperadores'])->name('pdfoperadores');
Route::get ('exceloperadores',[OperadoresController::class,'exceloperadores'])->name('exceloperadores');


//trasnportes
Route::get ('ReporteTrans',[TransporteController::class,'indextrans'])->name('indextrans');
Route::get ('altatranspor',[TransporteController::class,'create'])->name('altatranspor');
Route::post ('guardartranspor',[TransporteController::class,'guardartranspor'])->name('guardartranspor');
Route::get ('desactivatranspor/{idtranspor}',[TransporteController::class,'desactivatranspor'])->name('desactivatranspor');
Route::get ('activatranspor/{idtranspor}',[TransporteController::class,'activatranspor'])->name('activatranspor');
Route::delete ('borrartranspor/{idtranspor}',[TransporteController::class,'borrartranspor'])->name('borrartranspor');
Route::get ('modificartranspor/{idtranspor}',[TransporteController::class,'modificartranspor'])->name('modificartranspor');
Route::post ('cambiostranspor/{idtranspor}',[TransporteController::class,'update'])->name('cambiostranspor');
Route::get ('pdftransportes',[TransporteController::class,'pdftransportes'])->name('pdftransportes');
Route::get ('exceltransportes',[TransporteController::class,'exceltransportes'])->name('exceltransportes');
