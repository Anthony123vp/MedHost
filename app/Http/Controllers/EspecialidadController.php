<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Servicio_Especialidad;

use Illuminate\Http\Request;
class EspecialidadController extends Controller
{
    public function index()
    {
        $especialidades = Especialidad::all();
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        return view('especialidades.create', compact('especialidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $especialidad = Especialidad::create([
            'nombre' => $request->input('nombre'),
        ]);

        $id_especialidad = $especialidad->id_especialidad;
        
        Servicio_Especialidad::create([
            'id_servicio' => 1,
            'id_especialidad' => $id_especialidad,
        ]);
        Servicio_Especialidad::create([
            'id_servicio' => 2,
            'id_especialidad' => $id_especialidad,
        ]);
        Servicio_Especialidad::create([
            'id_servicio' => 3,
            'id_especialidad' => $id_especialidad,
        ]);
    
        return redirect()->route('especialidades.index')->with('success', 'Especialidad creado correctamente.');
    }


    public function show($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return view('especialidades.show', compact('especialidad'));
    } 


    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return view('especialidades.edit', compact('especialidad'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required',
        'estado' => 'required',
    ]);

    $especialidad = Especialidad::findOrFail($id);
    $especialidad->update($request->all());

    Servicio_Especialidad::where('id_especialidad', $id)
        ->update(['updated_at' => now()]);

    return redirect()->route('especialidades.index')->with('success', 'Especialidad actualizada correctamente.');
}

    public function destroy($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->estado = 0;
        $especialidad->updated_at = now();
        $especialidad->save();
    
        return redirect()->route('especialidades.index')->with('success', 'Especialidad desactivada correctamente.');
    }
}
