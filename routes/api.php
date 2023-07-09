<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('Reserva/{especialidad}/{servicio}',[ReservaController::class,'Tipo_Servicio']);
Route::get('Reserva/{id}',[ReservaController::class,'PrecioServicio']);
Route::get('Paciente/{dni}/Reserva',[ReservaController::class,'InformacionPaciente']);
Route::get('Medico/{id}/Informacion',[ReservaController::class,'InformacionMedico']);


Route::get('Medico/{especialidad}',[ReservaController::class,'getMedicos']);
Route::get('Medico/{medico}/Horarios',[ReservaController::class,'getHorarioMedico']);
Route::get('Consultorios/{medicos}',[ReservaController::class,'getConsultorios']);
Route::get('Consultorios/{especialidad}/especialidad',[ReservaController::class,'getConsultoriosEspecialidad']);
