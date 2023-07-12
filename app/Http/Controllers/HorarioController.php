<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth',['only'=>['index','create','edit','store','update']]);
    }

    public function index()
    {   
        if (Auth::user()->id_rol!=4){
            return redirect('Dashboard');
        }
        $id_user=Auth::user()->id_user;
        $medico=Medico::where('id_user',$id_user)->firstOrFail();
        $id_medico=$medico->id_medico;
        
        $horarios = DB::SELECT("select * from HORARIO_MEDICO where id_medico=$id_medico"); 
        return view('Medico_botones.horario.index',['horarios'=>$horarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->id_rol!=4){
            return redirect('Dashboard');
        }
        return view('Medico_botones.horario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->id_rol!=4){
            return redirect('Dashboard');
        }
        $request->validate([
            'fecha'=>'required',
            'hora_inicio'=>'required',
            'hora_final'=>'required',
        ]);

        $id_user=Auth::user()->id_user;
        $medico=Medico::where('id_user',$id_user)->firstOrFail();
        $id_medico=$medico->id_medico;


        $horario = new Horario();
        $horario->fecha = $request->input('fecha');
        $horario->hora_inicio = $request->input('hora_inicio');
        $horario->hora_final = $request->input('hora_final');
        DB::select("CALL hora_create('$horario->fecha','$horario->hora_inicio','$horario->hora_final',@horas)");
        DB::select("CALL registro_total($id_medico)");
        return redirect()->route('Horario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
