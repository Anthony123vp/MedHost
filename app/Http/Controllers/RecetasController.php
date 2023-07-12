<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Receta;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecetasController extends Controller
{
    public function index(){
        $recetas =DB::select("
        select a.id_receta,concat(c.nombres,' ', c.ape_paterno)AS paciente, c.dni, a.terapias, a.examenes, a.medicinas,
        a.comentario, a.estado from receta_medica a 
        inner join cita_medica b on a.id_receta = b.id_reserva
        inner join paciente c on b.id_paciente = c.id_paciente;");
        return view('Medico_botones/recetas/index', ['recetas'=>$recetas]);
    }

    public function create(){
        $pacientes = DB::select("SELECT * FROM paciente");
        return view('Medico_botones/recetas/create', ['pacientes' => $pacientes]);
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'paciente'=>'required',
            'diagnostico'=>'required',
            'terapias'=>'required',
            'examenes'=>'required',
            'medicinas'=>'required',
            'recomendacion'=>'required'
        ]);

        $id_reserva = 1; // Reemplaza 123 con el ID de la reserva que deseas obtener

         $reserva = Reserva::findOrFail($id_reserva);


        /*Creando nueva cita**/
        $receta_nueva= new Receta();
        $receta_nueva->id_reserva = $reserva;
        $receta_nueva->paciente= $request->paciente;
        $receta_nueva->diagnostico = $request->dni;
        $receta_nueva->terapia= $request->terapia;
        $receta_nueva->examenes= $request->examenes;
        $receta_nueva->medicinas= $request->medicinas;
        $receta_nueva->recomendacion= $request->recomendacion;
        $receta_nueva->prescripcion= $request->prescripcion;
        $receta_nueva->comentario= $request->comentario;
        $receta_nueva->fecha= $request->fecha;
        
        
        $receta_nueva -> save();
        return redirect()->route('recetas.index', $receta_nueva);
    }
}
