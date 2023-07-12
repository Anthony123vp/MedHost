<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\PagoPendiente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cita_Pendiente;
class ReservaPendienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only'=>['index','create','edit','store','update']]);
    }

    public function index(){
        if(Auth::user()->id_rol!=1){
            return redirect()->route('Dashboard');
        }
        $id_user=Auth::user()->id_user;
        $paciente=Paciente::where('id_user',$id_user)->firstOrFail();
        $id_paciente=$paciente->id_paciente;
        $citas_atendidas = Cita_Pendiente::where('id_paciente',$id_paciente)->get();
        return view ('Paciente_botones.citas_pendiente.index',['citas'=>$citas_atendidas]);
    }

    public function edit($id)
    {
        if(Auth::user()->id_rol!=1){
            return redirect()->route('Dashboard');
        }
        $monto = PagoPendiente::findOrFail($id);
        
        return view('Paciente_botones.pagos_pendiente.edit', compact('monto'));
    }

    public function update(Request $request, $id)
    {
        if(Auth::user()->id_rol!=1){
            return redirect()->route('Dashboard');
        }
        $pago = PagoPendiente::findOrFail($id);
        $pago->update([
            'estado' => 0,
            'updated_at' => now()
        ]);

        return redirect()->route('citas_pendiente.index')->with('success', 'Pago actualizado correctamente.');
    }
}
