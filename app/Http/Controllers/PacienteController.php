<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Usuario;
use App\Models\Insurance;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // public function index()
    // {
    //     $pacientes = Paciente::all();
    //     return view('pacientes.index', compact('pacientes'));
    // }

    public function index()
    {
        $pacientes = Paciente::with('insurance')->get();
        return view('pacientes.index', compact('pacientes'));
    }

    // public function create()
    // {
    //     return view('pacientes.create');
    // }

    public function create()
    {
        $insurances = Insurance::all();
        return view('pacientes.create', compact('insurances'));
    }

    public function store(Request $request)
    {
        

        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_2' => 'required',
        ]);

        
        $usuario = Usuario::create([
            'email' => $request->input('email'),
            'id_rol' =>1,
            'password' => bcrypt($request->input('password')),
            'password_2' => bcrypt($request->input('password_2')),
        ]);
        $id_usuarios = $usuario->id_user;

        $request->validate([
            'dni' => 'required',
            'nombres' => 'required',
            'ape_paterno' => 'required',
            'ape_materno' => 'required',
            'sexo' => 'required',
            'f_nacimiento' => 'required',
            'id_insurance' => 'required',
            'celular' => 'required',
        ]);

        $celular = str_replace('-', '', $request->input('celular'));
        $request->merge(['celular' => (int)$celular]);
        
        Paciente::create([
            'id_user' => $id_usuarios,
            'nombres' => $request->nombres,
            'ape_paterno' => $request->ape_paterno,
            'ape_materno' => $request->ape_materno,
            'dni' => $request->dni,
            'sexo' => $request->sexo,
            'f_nacimiento' => $request->f_nacimiento,
            'id_insurance' => $request->id_insurance,
            'celular' => $request->celular,
        ]);
    
        return redirect()->route('pacientes.index')->with('success', 'Paciente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show', compact('paciente'));
    } 

    // public function show(Paciente $paciente)
    // {
        //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Paciente $paciente)
    // {
        //
    // }


    public function edit($id)
    {
        // $paciente = Paciente::findOrFail($id);
        // return view('pacientes.edit', compact('paciente'));


        $paciente = Paciente::findOrFail($id);
        $id_user = $paciente->id_user;
        $usuario = Usuario::findOrFail($id_user);
        $insurances = Insurance::all();

        return view('pacientes.edit', compact('paciente', 'usuario','insurances'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Paciente $paciente)
    // {
        //
    // }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nombres' => 'required|unique:pacientes,nombres,'.$id.',id_paciente',
        //     'ape_paterno' => 'required',
        //     'ape_materno' => 'required',
        //     'sexo' => 'required',
        //     'f_nacimiento' => 'required',
        //     'celular' => 'required',
        //     'insurance' => 'required',
        //     'dni' => 'required',
        // ]);
        
        
        // $paciente = Paciente::findOrFail($id);
        // $paciente->update([
        //     'nombres' => $request->nombres,
        //     'ape_paterno' => $request->ape_paterno,
        //     'ape_materno' => $request->ape_materno,
        //     'sexo' => $request->sexo,
        //     'celular' => $request->celular,
        //     'insurance' => $request->insurance,
        //     'dni' => $request->dni,
        //     'f_nacimiento' => $request->f_nacimiento,
        //     'updated_at' => now()
        // ]);

        // $paciente = Paciente::findOrFail($id);
        // $paciente->update($request->all());

        // ---------------------------------

        $request->validate([
            'nombres' => 'required|unique:paciente,nombres,'.$id.',id_paciente',
            'ape_paterno' => 'required',
            'ape_materno' => 'required',
            'sexo' => 'required',
            'celular' => 'required',
            'dni' => 'required',
            'f_nacimiento' => 'required',
            'id_insurance' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_2' => 'required',
        ]);

        $paciente = Paciente::findOrFail($id);
        $id_user = $paciente->id_user;
        
        $paciente->update([
            'nombres' => $request->nombres,
            'ape_paterno' => $request->ape_paterno,
            'ape_materno' => $request->ape_materno,
            'sexo' => $request->sexo,
            'celular' => $request->celular,
            'dni' => $request->dni,
            'f_nacimiento' => $request->f_nacimiento,
            'id_insurance' => $request->id_insurance,
            'updated_at' => now()
        ]);

        $usuario = Usuario::findOrFail($id_user);
        $usuario->update([
            'email' => $request->email,
            'password' => $request->password,
            'password_2' => $request->password_2,
            'updated_at' => now()
        ]);

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {

        // $paciente = Paciente::findOrFail($id);
        // $paciente->estado = 0;
        // $paciente->updated_at = now();
        // $paciente->save();


        $paciente = Paciente::findOrFail($id);
        $idUsuario = $paciente->id_user;

        $paciente->estado = 0;
        $paciente->updated_at = now();
        $paciente->save();

        $usuario = Usuario::findOrFail($idUsuario);
        $usuario->estado = 0;
        $usuario->updated_at = now();
        $usuario->save();

        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado correctamente.');
    }
}
