<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        $administradores = Administrador::all();
        return view('administradores.index', compact('administradores'));
    }

    public function create()
    {
        return view('administradores.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_2' => 'required',
        ]);

        $data = $request->all();
        $data['id_rol'] = 2; 
    
        
        $usuario = Usuario::create($data);
        $id_usuarios = $usuario->id_user;

        $request->validate([
            'dni' => 'required',
            'nombres' => 'required',
            'ape_paterno' => 'required',
            'ape_materno' => 'required',
            'sexo' => 'required',
            'celular' => 'required',
            'f_nacimiento' => 'required',
        ]);
        
        Administrador::create([
            'id_user' => $id_usuarios,
            'dni' => $request->dni,
            'nombres' => $request->nombres,
            'ape_paterno' => $request->ape_paterno,
            'ape_materno' => $request->ape_materno,
            'sexo' => $request->sexo,
            'f_nacimiento' => $request->f_nacimiento,
            'celular' => $request->celular,
            // 'password_1' => bcrypt($request->password_1),
        ]);
    
        return redirect()->route('administradores.index')->with('success', 'Administrador creado correctamente.');
    }


    public function show($id)
    {
        $administrador = Administrador::findOrFail($id);
        return view('administradores.show', compact('administrador'));
    } 


    public function edit($id)
    {
        $administrador = Administrador::findOrFail($id);
        $id_user = $administrador->id_user;
        $usuario = Usuario::findOrFail($id_user);

        return view('administradores.edit', compact('administrador', 'usuario'));
    }
    
    public function edit2($id)
    {
        $administrador = Administrador::findOrFail($id);
        // return view('recepcionistas.destroy', compact('recepcionista'));
        return redirect()->route('administradores.destroy', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {


        $request->validate([
            'nombres' => 'required|unique:administradores,nombres,'.$id.',id_administrador',
            'ape_paterno' => 'required',
            'ape_materno' => 'required',
            'sexo' => 'required',
            'celular' => 'required',
            'dni' => 'required',
            'f_nacimiento' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_2' => 'required',
        ]);

        $administrador = Administrador::findOrFail($id);
        $id_user = $administrador->id_user;
        
        $administrador->update([
            'nombres' => $request->nombres,
            'ape_paterno' => $request->ape_paterno,
            'ape_materno' => $request->ape_materno,
            'sexo' => $request->sexo,
            'celular' => $request->celular,
            'dni' => $request->dni,
            'f_nacimiento' => $request->f_nacimiento,
            'updated_at' => now()
        ]);

        $usuario = Usuario::findOrFail($id_user);
        $usuario->update([
            'email' => $request->email,
            'password' => $request->password,
            'password_2' => $request->password_2,
            'updated_at' => now()
        ]);
        
        return redirect()->route('administradores.index')->with('success', 'Administrador actualizado correctamente.');
    }


    public function destroy($id)
    {
        $administrador = Administrador::findOrFail($id);
        $idUsuario = $administrador->id_user;

        $administrador->estado = 0;
        $administrador->updated_at = now();
        $administrador->save();

        $usuario = Usuario::findOrFail($idUsuario);
        $usuario->estado = 0;
        $usuario->updated_at = now();
        $usuario->save();

        return redirect()->route('administradores.index')->with('success', 'Administrador desactivado correctamente.');
    }

}
