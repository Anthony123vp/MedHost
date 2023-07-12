<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Usuario;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth',['only'=>['index','create','edit','store','update']]);
    }
    public function index()
    {
        if (Auth::user()->id_rol!=3){
            return redirect('Dashboard');
        }
        $pacientes = Paciente::with('insurance')->get();
        return view('pacientes.index', compact('pacientes'));
    }


    public function create()
    {
        if (Auth::user()->id_rol!=3){
            return redirect('Dashboard');
        }
        $insurances = Insurance::all();
        return view('pacientes.create', compact('insurances'));
    }

    public function store(Request $request)
    {
        
        if (Auth::user()->id_rol!=3){
            return redirect('Dashboard');
        }
        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_2' => 'required|same:password',
        ]);

        
        $usuario = Usuario::create([
            'email' => $request->input('email'),
            'id_rol' =>1,
            'password' => bcrypt($request->input('password')),
            'password_2' => bcrypt($request->input('password_2')),
        ]);

        $id_usuarios = $usuario->id_user;

        $request->validate([
            'dni' => 'required|min:8|max:8',
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


    public function show($id)
    {
        if (Auth::user()->id_rol!=3){
            return redirect('Dashboard');
        }
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show', compact('paciente'));
    } 



    public function edit($id)
    {
        if (Auth::user()->id_rol!=3){
            return redirect('Dashboard');
        }

        $paciente = Paciente::findOrFail($id);
        $id_user = $paciente->id_user;
        $usuario = Usuario::findOrFail($id_user);
        $insurances = Insurance::all();

        return view('pacientes.edit', compact('paciente', 'usuario','insurances'));
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->id_rol!=3){
            return redirect('Dashboard');
        }
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
        if (Auth::user()->id_rol!=3){
            return redirect('Dashboard');
        }

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
