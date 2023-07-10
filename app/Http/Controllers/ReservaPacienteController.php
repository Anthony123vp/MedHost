<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;
use App\Models\Paciente;
use App\Models\Reserva;
use App\Models\Horario;
use App\Models\PagoPendiente;
use App\Models\Servicio_Medhost;

class ReservaPacienteController extends Controller
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
        if (Auth::user()->id_rol!=1){
            return redirect('Dashboard');
        }
        $medicos=Medico::get(); 
        $especialidades=Especialidad::get();
        return view('Paciente_botones.CrearCita.index',['medicos' => $medicos,'especialidades'=>$especialidades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        if (Auth::user()->id_rol!=1){
            return redirect('Dashboard');
        }
        $medico=Medico::where('id_medico',$id)->FirstOrFail();
        $id_user=Auth::user()->id_user;
        $paciente=Paciente::where('id_user',$id_user)->firstOrFail();
        $servicios=Servicio::get();
        return view('Paciente_botones.CrearCita.reserva_create',['medico' => $medico,'paciente'=>$paciente,'servicios'=>$servicios]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_paciente)
    {

        if (Auth::user()->id_rol!=1){
            return redirect('Dashboard');
        }       
        $reserva = new Reserva();
            $reserva->id_paciente=$id_paciente;
            $reserva->id_servicio_medhost=$request->servicio_medhost;
            $reserva->id_medico_horario=$request->medico_horario;
            $reserva->modalidad=$request->modalidad;
            $reserva->save();

            $id_horario_medico=Horario::where('id_medico_horario',$request->medico_horario)->FirstOrFail();
            $id_horario_medico->estado='0';
            $id_horario_medico->save();


            $precio = Servicio_Medhost::findOrFail($request->servicio_medhost)->precio;
            $pago_pendiente= new PagoPendiente();
            $pago_pendiente->id_cita_medica = $reserva->id_reserva;
            $pago_pendiente->monto= $precio;
            $pago_pendiente->metodo_pago = 'Tajeta';
            $pago_pendiente->estado = 1;
            $pago_pendiente -> save();
            

            return redirect()->route('citas_pendiente.index');

            
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
