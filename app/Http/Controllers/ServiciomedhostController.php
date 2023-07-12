<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Servicio;
use App\Models\Servicio_Especialidad;
use App\Models\Servicio_Medhost;

use Illuminate\Http\Request;
class ServiciomedhostController extends Controller
{
    public function index()
    {

        $servicios_medhost = Servicio_Medhost::with('servicio_especialidad')->get();
        return view('serviciosmedhost.index', compact('servicios_medhost'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        $servicios = Servicio::all();
        return view('serviciosmedhost.create', compact('especialidades', 'servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_servicio' => 'required',
            'id_especialidad' => 'required',
            'nombre' => 'required',
            'precio' => 'required',
        ]);

        $servicioEspecialidad = Servicio_Especialidad::where('id_especialidad', $request->id_especialidad)
            ->where('id_servicio', $request->id_servicio)
            ->first();

        if (!$servicioEspecialidad) {
            return redirect()->back()->with('error', 'No se encontró el servicio y especialidad especificados.');
        }

        $idServicioEspecialidad = $servicioEspecialidad->id_servicio_especialidad;

        Servicio_Medhost::create([
            'id_servicio_especialidad' => $idServicioEspecialidad,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'estado' => 1,
        ]);


        return redirect()->route('serviciosmedhost.index')->with('success', 'Servicio Exacto creado correctamente.');
    }


    public function show($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return view('especialidades.show', compact('especialidad'));
    } 


    public function edit($id)
    {
        $servicio_medhost = Servicio_Medhost::findOrFail($id);
        $especialidades = Especialidad::all();
        $servicios = Servicio::all();
        
        $servicioEspecialidad = Servicio_Especialidad::where('id_especialidad', $servicio_medhost->id_servicio_especialidad)
        ->first();
        
        if (!$servicioEspecialidad) {
            return redirect()->back()->with('error', 'No se encontró el servicio y especialidad especificados.');
        }
        
        return view('serviciosmedhost.edit', compact('servicio_medhost','especialidades','servicios','servicioEspecialidad'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_servicio' => 'required',
            'id_especialidad' => 'required',
            'nombre' => 'required',
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

        return redirect()->route('serviciosmedhost.index')->with('success', 'Servicio_Medhost actualizada correctamente.');
    }

    public function destroy($id)
    {
        $servicio_medhost = Servicio_Medhost::findOrFail($id);
        $servicio_medhost->estado = 0;
        $servicio_medhost->updated_at = now();
        $servicio_medhost->save();
    
        return redirect()->route('serviciosmedhost.index')->with('success', 'Servicio_Medhost desactivada correctamente.');
    }
}
