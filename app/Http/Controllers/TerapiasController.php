<?php
namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Cita_Pendiente;
use App\Models\Paciente;
use App\Models\Insurance;
use App\Models\Terapia;
use Carbon\Carbon;
use App\Models\Reserva;

class TerapiasController extends Controller
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
        return view('Medico_botones.examenes.index',['citas'=>$citas_pendientes]);
    }

    public function create(){

    return view('Medico_botones.examenes.create');
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
        return view('Medico_botones.terapias.edit', compact('pacientes', 'seguros','edad','reserva','horaFin'));
    }

    public function store(Request $request,Reserva $id)
    {
        $id->estado=0;
        $id->save();

        $request->validate([
            'id_reserva' => 'required',
            'firma_base64' => 'required',
            'objetivos_tratamiento' => 'required',
            'modalidad_terapia' => 'required',
            'frecuencia_sesiones' => 'required',
            'duracion_tratamiento' => 'required',
            'intervenciones_terapeuticas' => 'required',
            'recomendaciones' => 'required',
        ]);

            $firmaBase64 = $request->input('firma_base64');
            $nombreArchivo = 'firma_' . time() . '.png';
            $rutaArchivo = public_path('firmas_imagenes/' . $nombreArchivo);
            $explotado_parts = explode(";base64", $firmaBase64);
            $explotado_aux = explode("image/", $explotado_parts[0]);
            $decode_64 = base64_decode($explotado_parts[1]);
            file_put_contents($rutaArchivo, $decode_64);


            Terapia::create([
            'id_reserva' => $request->id_reserva,
            'img_firma_doctor' => $nombreArchivo,
            'objetivos_tratamiento' => $request->objetivos_tratamiento,
            'modalidad_terapia' => $request->modalidad_terapia,
            'frecuencia_sesiones' => $request->frecuencia_sesiones,
            'duracion_tratamiento' => $request->duracion_tratamiento,
            'intervenciones_terapeuticas' => $request->intervenciones_terapeuticas,
            'recomendaciones' => $request->recomendaciones,
            'estado' => 1,
        ]);


        return redirect()->route('citas_programadas.index')->with('success', 'Resultado Terapia creada correctamente.');
    }
}
