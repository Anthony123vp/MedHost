<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\ServicioController; 
use App\Http\Controllers\Servicio_especialidadController; 
use App\Http\Controllers\ServiciomedhostController; 
use App\Http\Controllers\ReservaPacienteController;

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ReservaPendienteController;
use App\Http\Controllers\ReservaProgramadaController;
use App\Http\Controllers\RecetasController;

use App\Http\Controllers\AuthenthicatedSessionController;
use App\Http\Controllers\ExamenesController;
use App\Http\Controllers\HistorialClinicoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\TerapiasController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::view('/','MedHostPublic.home');

Route::get('/layoutheader', function () {
    return view('layoutsmedhost.header'); 
});

Route::get('/layoutfooter', function () {
    return view('layoutsmedhost.footer'); 
});

Route::get('/layoutloader', function () {
    return view('layoutsmedhost.loader'); 
});


Route::view('/medhost_home', 'MedHostPublic.home')->name('Home_MedHost');
Route::view('/medhost_contactanos', 'MedHostPublic.contactanos')->name('Contact_MedHost');
Route::view('/medhost_servicios', 'MedHostPublic.servicios')->name('Servicios_MedHost');
Route::view('/medhost_overview','MedHostPublic.overview')->name('Team_MedHost');
Route::view('/medhost_about_our_team','MedHostPublic.about_our_team')->name('OurTeam_MedHost');
Route::view('/medhost_especialidades','MedHostPublic.especialidades')->name('Especialidades_MedHost');

Route::view('/pagos_pendiente','Paciente_botones.pagos_pendiente.index')->name('pagos_pendiente');

// Route::view('/Login_Sign_User', 'Sistema.log_sign' )->name('Login_Sign_User');
Route::get('/log_sign', [SistemaController::class,'index'])->name('login')->middleware('web');

/*AUTENTICACION DE USUARIO */
// Route::view('/Login_Sign_User', 'Sistema.log_sign' )->name('login');
Route::post('/LoginUser',[AuthenthicatedSessionController::class,'store'])->name('Login.store');
Route::post('/Logout',[AuthenthicatedSessionController::class,'destroy'])->name('Logout');
Route::view('/Dashboard','Sistema.dashboard')-> name('Dashboard');


Route::get('/pacientes', [PacienteController::class,'index'])->name('pacientes.index')->middleware('web');
Route::get('/pacientes/create',[PacienteController::class,'create'])->name('pacientes.create');
Route::post('/Sistema', [PacienteController::class, 'store'])->name('pacientes.store');
Route::get('/pacientes/create',[PacienteController::class,'create'])->name('pacientes.create');
Route::get('/pacientes/{id}/editar', [PacienteController::class, 'edit'])->name('pacientes.edit');
Route::put('/pacientes/{id}', [PacienteController::class, 'update'])->name('pacientes.update');
Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');


// Route::view('/medicos','Medicos.index')->name('indexmedicos');
// Route::view('/recepcionista','Recepcionista.index');

Route::get('/horarios',[HorarioController::class,'index'])->name('Horario.index');
Route::get('/horarios/create',[HorarioController::class,'create'])->name('Horario.create');
Route::post('/horarios',[HorarioController::class,'store'])->name('Horario.store');
// Route::get('/usuarios', [UsuarioController::class,'index'])->middleware('web');

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index')->middleware('web');
Route::get('/usuarios/create',[UsuarioController::class,'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}/editar', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::get('/usuarios/{id}/edit2', [UsuarioController::class, 'edit2'])->name('usuarios.edit2');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');

Route::put('/usuarios/{id}/activate', [UsuarioController::class, 'activate'])->name('usuarios.activate');

Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

Route::get('/recepcionistas', [RecepcionistaController::class, 'index'])->name('recepcionistas.index')->middleware('web');
Route::get('/recepcionistas/create',[RecepcionistaController::class,'create'])->name('recepcionistas.create');
Route::post('/recepcionistas', [RecepcionistaController::class, 'store'])->name('recepcionistas.store');
Route::match(['get', 'put'], '/recepcionistas/{id}/editar', [RecepcionistaController::class, 'edit'])->name('recepcionistas.edit');
Route::get('/recepcionistas/{id}/edit2', [RecepcionistaController::class, 'edit2'])->name('recepcionistas.edit2');
Route::put('/recepcionistas/{id}', [RecepcionistaController::class, 'update'])->name('recepcionistas.update');
Route::delete('/recepcionistas/{id}', [RecepcionistaController::class, 'destroy'])->name('recepcionistas.destroy');


Route::get('/especialidades', [EspecialidadController::class, 'index'])->name('especialidades.index')->middleware('web');
Route::get('/especialidades/create',[EspecialidadController::class,'create'])->name('especialidades.create');
Route::get('/especialidades/{id}/editar', [EspecialidadController::class, 'edit'])->name('especialidades.edit');
Route::post('/especialidades', [EspecialidadController::class, 'store'])->name('especialidades.store');
Route::put('/especialidades/{id}', [EspecialidadController::class, 'update'])->name('especialidades.update');
Route::delete('/especialidades/{id}', [EspecialidadController::class, 'destroy'])->name('especialidades.destroy');

Route::get('/insurances', [InsuranceController::class, 'index'])->name('insurances.index')->middleware('web');
Route::get('/insurances/create',[InsuranceController::class,'create'])->name('insurances.create');
Route::get('/insurances/{id}/editar', [InsuranceController::class, 'edit'])->name('insurances.edit');
Route::post('/insurances', [InsuranceController::class, 'store'])->name('insurances.store');
Route::put('/insurances/{id}', [InsuranceController::class, 'update'])->name('insurances.update');
Route::delete('/insurances/{id}', [InsuranceController::class, 'destroy'])->name('insurances.destroy');


Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index')->middleware('web');
Route::get('/medicos/create',[MedicoController::class,'create'])->name('medicos.create');
Route::post('/medicos', [MedicoController::class, 'store'])->name('medicos.store');
Route::match(['get', 'put'], '/medicos/{id}/editar', [MedicoController::class, 'edit'])->name('medicos.edit');
Route::put('/medicos/{id}', [MedicoController::class, 'update'])->name('medicos.update');
Route::delete('/medicos/{id}', [MedicoController::class, 'destroy'])->name('medicos.destroy');


Route::get('/roles', [RolController::class, 'index'])->name('roles.index')->middleware('web');

Route::get('/serviciosmedhost', [ServiciomedhostController::class, 'index'])->name('serviciosmedhost.index')->middleware('web');
Route::get('/serviciosmedhost/create',[ServiciomedhostController::class,'create'])->name('serviciosmedhost.create');
Route::post('/serviciosmedhost', [ServiciomedhostController::class, 'store'])->name('serviciosmedhost.store');
Route::get('/serviciosmedhost/{id}/editar', [ServiciomedhostController::class, 'edit'])->name('serviciosmedhost.edit');
Route::put('/serviciosmedhost/{id}', [ServiciomedhostController::class, 'update'])->name('serviciosmedhost.update');
Route::delete('/serviciosmedhost/{id}', [ServiciomedhostController::class, 'destroy'])->name('serviciosmedhost.destroy');

Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index')->middleware('web');

Route::get('/servicios_especialidades', [Servicio_especialidadController::class, 'index'])->name('servicios_especialidades.index')->middleware('web');



Route::get('/administradores', [AdministradorController::class, 'index'])->name('administradores.index')->middleware('web');
Route::get('/administradores/create',[AdministradorController::class,'create'])->name('administradores.create');
Route::post('/administradores', [AdministradorController::class, 'store'])->name('administradores.store');
Route::match(['get', 'put'], '/administradores/{id}/editar', [AdministradorController::class, 'edit'])->name('administradores.edit');
Route::put('/administradores/{id}', [AdministradorController::class, 'update'])->name('administradores.update');
Route::delete('/administradores/{id}', [AdministradorController::class, 'destroy'])->name('administradores.destroy');


// Route::view('/nuevo_usuario','usuarios.create');

// Route::view('/pacientes','pacientes.table');




// /Vista de boton para la rececpcionista/
//     /Crud de Reservas/
    Route::get('/reservas',[ReservaController::class,'index'])->name('reservas.index');
    Route::get('/reservas/create',[ReservaController::class,'create'])->name('reservas.create');
    Route::post('/reservas',[ReservaController::class,'store'])->name('reservas.store');
    Route::get('/reservas/{id}',[ReservaController::class,'edit'])->name('reservas.edit');
    Route::patch('/reservas/{id}',[ReservaController::class,'update'])->name('reservas.update');
    Route::delete('/reservas/{id}',[ReservaController::class,'destroy'])->name('reservas.destroy');
    Route::post('/Informe',[ReservaController::class,'generateInforme'])->name('reservas.generateInforme');
    
    //Vista de botones para el paciente:
    Route::get('/citas_pendientes',[ReservaPendienteController::class,'index'])->name('citas_pendiente.index');
    Route::get('/pagos_pendiente/{id}/editar', [ReservaPendienteController::class, 'edit'])->name('pagos_pendiente.edit');
    Route::put('/pagos_pendiente/{id}', [ReservaPendienteController::class, 'update'])->name('pagos_pendiente.update');
Route::get ('/historial',[HistorialClinicoController::class,'index'])->name('historial.index');
Route::get('/cita_medica_resultado/{id}',[HistorialClinicoController::class,'getResultadoCitaMedica'])->name('ResultadoCitaMedica');
Route::get('/examen_resultado/{id}',[HistorialClinicoController::class,'getResultadoExamen'])->name('ResultadoExamen');
Route::get('/terapia_resultado/{id}',[HistorialClinicoController::class,'getResultadoTerapia'])->name('ResultadoTerapia');


//Vista de botones para el medico
    /*Visualizacion de citas para atender */
    Route::get('/citas_programadas',[ReservaProgramadaController::class,'index'])->name('citas_programadas.index');
    Route::get('/citas_programadas/{id}/{id2}/editar', [ReservaProgramadaController::class, 'edit'])->name('citas_programadas.edit');
    Route::put('/citas_programadas/{id}', [ReservaProgramadaController::class, 'update'])->name('citas_programadas.update');
    Route::patch('/citas_programadas/{id}', [ReservaProgramadaController::class, 'store'])->name('citas_programadas.store');
    // Route::get('/citas_crear', [HistorialController::class,'create'])->name('citas_crear.create');
    // Route::get('/citas_editar', [HistorialController::class,'edit'])->name('citas_editar.edit');
    // Route::post('/receta.store',[HistorialController::class, 'store'])->name('recetas.store');
    /*Creacion de Reservas */
    Route::get('/ReservaPaciente',[ReservaPacienteController::class,'index'])->name('ReservaPacienteIndex');
    Route::get('/ReservaPaciente/create/{id}',[ReservaPacienteController::class,'create'])->name('PacienteCreateCita');
    Route::post('/ReservaPaciente/{id_paciente}',[ReservaPacienteController::class,'store'])->name('PacienteReserva.store');
    /*Creacion de Horarios */
    Route::get('/examenes',[ExamenesController::class,'index'])->name('examenes.index');
    Route::get('/examenes/{id}/{id2}/editar', [ExamenesController::class, 'edit'])->name('examenes.edit');
    Route::patch('/examenes/{id}', [ExamenesController::class, 'store'])->name('examenes.store');

    Route::get('/terapias',[TerapiasController::class,'index'])->name('terapias.index');
    Route::get('/terapias/{id}/{id2}/editar', [TerapiasController::class, 'edit'])->name('terapias.edit');
    Route::patch('/terapias/{id}', [TerapiasController::class, 'store'])->name('terapias.store');
    


    Route::get('/horarios',[HorarioController::class,'index'])->name('Horario.index');
    Route::get('/horarios/create',[HorarioController::class,'create'])->name('Horario.create');
    Route::post('/horarios',[HorarioController::class,'store'])->name('Horario.store');
    
    // /*Creacion de Recetas*/
    // // Route::get('/recetas',[RecetasController::class,'index'])->name('recetas.index');
    // // Route::get('/recetas/create',[RecetasController::class,'create'])->name('recetas.create');

    // // Route::get('/examenes',[ExamenesController::class,'index'])->name('examenes.index');
    // // Route::get('/examenes/create',[ExamenesController::class,'create'])->name('examenes.create');
    // // Route::get('/examenes/store',[ExamenesController::class,'store'])->name('examenes.store');

    // Route::get('/terapia',[TerapiaController::class,'index'])->name('terapia.index');
    // Route::get('/terapia/create',[TerapiaController::class,'create'])->name('terapia.create');
    // Route::get('/terapia/store',[TerapiaController::class,'store'])->name('terapia.store');

    // Route::view('/terapia', 'Medico_botones.terapia.create')->name('terapia.create');
    // Route::view('/examenes', 'Medico_botones.examenes.create')->name('examenes.create');
    // Route::view('/recetas', 'Medico_botones.recetas.create')->name('recetas.create');
