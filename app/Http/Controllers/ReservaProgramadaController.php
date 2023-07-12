<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Cita_Pendiente;
use App\Models\Servicio_Especialidad;
use App\Models\Servicio_Medhost;
use App\Models\Paciente;
use App\Models\Insurance;
use App\Models\Receta;
use Carbon\Carbon;
use App\Models\Reserva;

class ReservaProgramadaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $id_user=Auth::user()->id_user;
        $medico=Medico::where('id_user',$id_user)->firstOrFail();
        $id_medico=$medico->id_medico;
        $citas_pendientes = Cita_Pendiente::where('id_medico',$id_medico)->get();
        return view('Medico_botones.citas_programadas.index',['citas'=>$citas_pendientes]);
    }

    public function edit($id, $id2)
    {

        $pacientes = Paciente::findOrFail($id);
        $fechaNacimiento = $pacientes->f_nacimiento;
        $edad = Carbon::parse($fechaNacimiento)->diffInYears(Carbon::now());
        $id_insurance = $pacientes->id_insurance;
        $seguros = Insurance::findOrFail($id_insurance);
        $reserva = Cita_Pendiente::where('id_reserva', $id2)->firstOrFail();
        $horaFin = Carbon::parse($reserva->hora_inicio)->addMinutes(30);
        return view('Medico_botones.citas_programadas.edit', compact('pacientes', 'seguros','edad','reserva','horaFin'));
    }


    public function store(Request $request,Reserva $id)
    {
        
        $id->estado=0;
        $id->save();
        $request->validate([
            'firma_base64' => 'required',
            'id_reserva' => 'required',
            'terapias' => 'required',
            'examenes' => 'required',
            'motivo_ingreso' => 'required',
            'diagnostico_ingreso' => 'required',
            'comorbilidades' => 'required',
            'procedimientos' => 'required',
            'medicamentos_recibidos' => 'required',
            'comentario_doctor' => 'required',
            'estado_paciente' => 'required',
            'medicamentos_casa' => 'required',
        ]);


            $firmaBase64 = $request->input('firma_base64');
            $nombreArchivo = 'firma_' . time() . '.png';
            $rutaArchivo = public_path('firmas_imagenes/' . $nombreArchivo);
            $explotado_parts = explode(";base64", $firmaBase64);
            $explotado_aux = explode("image/", $explotado_parts[0]);
            $decode_64 = base64_decode($explotado_parts[1]);
            file_put_contents($rutaArchivo, $decode_64);


        Receta::create([
            'terapias' => $request->terapias,
            'examenes' => $request->examenes,
            'id_reserva' => $request->id_reserva,
            'motivo_ingreso' => $request->motivo_ingreso,
            'diagnostico_ingreso' => $request->diagnostico_ingreso,
            'comorbilidades' => $request->comorbilidades,
            'procedimientos' => $request->procedimientos,
            'medicamentos_recibidos' => $request->medicamentos_recibidos,
            'comentario_doctor' => $request->comentario_doctor,
            'estado_paciente' => $request->estado_paciente,
            'medicamentos_casa' => $request->medicamentos_casa,
            'img_firma_doctor' => $nombreArchivo,
            'estado' => 1,
        ]);


        return redirect()->route('citas_programadas.index')->with('success', 'Receta creada correctamente.');
    }


    public function update(Request $request, $id)
    {

        
        $request->validate([
            'id_servicio' => 'required',
            'motivo_ingreso' => 'required',
            'diagnostico_ingreso' => 'required',
            'precio' => 'required',
        ]);

        $servicioEspecialidad = Servicio_Especialidad::where('id_especialidad', $request->id_especialidad)
            ->where('id_servicio', $request->id_servicio)
            ->first();

        if (!$servicioEspecialidad) {
            return redirect()->back()->with('error', 'No se encontró el servicio y especialidad especificados.');
        }

        $idServicioEspecialidad = $servicioEspecialidad->id_servicio_especialidad;

        $servicio_medhost = Servicio_Medhost::findOrFail($id);
        $servicio_medhost->update([
            'id_servicio_especialidad' => $idServicioEspecialidad,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'updated_at' => now()
        ]);

        return redirect()->route('Medico_botones.citas_programadas.index')->with('success', 'Servicio_Medhost actualizada correctamente.');
    }
}
