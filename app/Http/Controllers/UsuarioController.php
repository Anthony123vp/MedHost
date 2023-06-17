<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Paciente;
use App\Models\Administrador;
use App\Models\Recepcionista;
use App\Models\Medico;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'password_1' => 'required',
    //         'password_2' => 'required',
    //         'estado' => 'required',
    //         'email' => 'required|unique:usuarios',
    //         'id_rol' => 'required',
    //     ]);
    
    //     Usuario::create($request->all());
    
    //     return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_2' => 'required',
            'email' => 'required|unique:users',
        ]);

        $data = $request->all();

        Usuario::create($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    } 


    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }
    
    public function edit2($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.destroy', compact('usuario'));
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'email' => 'required|unique:usuarios,email,'.$id,
    //         'password_1' => 'required',
    //         'password_2' => 'required',
    //         'estado' => 'required',
    //         'id_rol' => 'required',
    //     ]);
    
    //     $usuario = Usuario::findOrFail($id);
    //     $usuario->update([
    //         'email' => $request->email,
    //         'password_1' => $request->password_1,
    //         'password_2' => $request->password_2,
    //         'estado' => $request->estado,
    //         'id_rol' => $request->id_rol,
    //         'updated_at' => now()
    //     ]);
    
    //     return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|unique:users,email,'.$id.',id_usuarios',
            'password_1' => 'required',
            'password_2' => 'required',
            'estado' => 'required',
            'id_rol' => 'required',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update([
            'email' => $request->email,
            'password_1' => $request->password_1,
            'password_2' => $request->password_2,
            'estado' => $request->estado,
            'id_rol' => $request->id_rol,
            'updated_at' => now()
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }
    
    public function activate($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->estado = 1;
        $usuario->updated_at = now();
        $usuario->save();

        if ($usuario->id_rol == 1) {
            $paciente = Paciente::where('id_user', $id)->first();
            if ($paciente) {
                $paciente->estado = 1;
                $paciente->updated_at = now();
                $paciente->save();
            }
        }else if ($usuario->id_rol == 2) {
            $administrador = Administrador::where('id_user', $id)->first();
            if ($administrador) {
                $administrador->estado = 1;
                $administrador->updated_at = now();
                $administrador->save();
            }
        }else if ($usuario->id_rol == 3) {
            $recepcionista = Recepcionista::where('id_user', $id)->first();
            if ($recepcionista) {
                $recepcionista->estado = 1;
                $recepcionista->updated_at = now();
                $recepcionista->save();
            }
        }else if ($usuario->id_rol == 4) {
            $medico = Medico::where('id_user', $id)->first();
            if ($medico) {
                $medico->estado = 1;
                $medico->updated_at = now();
                $medico->save();
            }
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuario activado correctamente.');
    }


    public function destroy($id)
    {
        // $usuario = Usuario::findOrFail($id);
        // $usuario->estado = 0;
        // $usuario->save();

        $usuario = Usuario::findOrFail($id);
        $usuario->estado = 0;
        $usuario->updated_at = now();
        $usuario->save();

        if ($usuario->id_rol == 1) {
            $paciente = Paciente::where('id_user', $id)->first();
            if ($paciente) {
                $paciente->estado = 0;
                $paciente->updated_at = now();
                $paciente->save();
            }
        }else if ($usuario->id_rol == 2) {
            $administrador = Administrador::where('id_user', $id)->first();
            if ($administrador) {
                $administrador->estado = 0;
                $administrador->updated_at = now();
                $administrador->save();
            }
        }else if ($usuario->id_rol == 3) {
            $recepcionista = Recepcionista::where('id_user', $id)->first();
            if ($recepcionista) {
                $recepcionista->estado = 0;
                $recepcionista->updated_at = now();
                $recepcionista->save();
            }
        }else if ($usuario->id_rol == 4) {
            $medico = Medico::where('id_user', $id)->first();
            if ($medico) {
                $medico->estado = 0;
                $medico->updated_at = now();
                $medico->save();
            }
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuario desactivado correctamente.');
    }
    
    // public function destroy2($id)
    // {
    //     $usuario = Usuario::findOrFail($id);
    //     $usuario->estado = 1;
    //     $usuario->save();

    //     return redirect()->route('usuarios.index')->with('success', 'Usuario desactivado correctamente.');
    // }

}
