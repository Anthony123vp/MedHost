<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Usuario;

class SistemaController extends Controller
{
    public function index()
    {
        $insurances = Insurance::all();
        return view('Sistema.log_sign', compact('insurances'));
    }

    public function store(Request $request)
    {
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
        // -------------------
        
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
        
        return redirect()->route('login')->with('success', 'Paciente creado correctamente.');
    }
}
