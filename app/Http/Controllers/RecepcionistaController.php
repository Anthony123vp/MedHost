<?php

namespace App\Http\Controllers;

use App\Models\Recepcionista;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecepcionistaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['only'=>['index','create','edit','store','update']]);
    }
    
    public function index()
    {
        if (Auth::user()->id_rol!=2){
            return redirect('Dashboard');
        }
        $recepcionistas = Recepcionista::all();
        return view('recepcionistas.index', compact('recepcionistas'));
    }

    public function create()
    {
        if (Auth::user()->id_rol!=2){
            return redirect('Dashboard');
        }
        return view('recepcionistas.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->id_rol!=2){
            return redirect('Dashboard');
        }
        // $request->validate([
        //     'nombres' => 'required',
        //     'ape_paterno' => 'required',
        //     'ape_materno' => 'required',
        //     'celular' => 'required',
        //     'dni' => 'required',
        //     'f_nacimiento' => 'required',
        // ]);
        // Recepcionista::create($request->all());

        // -------------------------

        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_2' => 'required',
        ]);

        $usuario = Usuario::create([
            'email' => $request->input('email'),
            'id_rol' =>3,
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
            'celular' => 'required',
            'f_nacimiento' => 'required',
        ]);
        
        Recepcionista::create([
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
    
        return redirect()->route('recepcionistas.index')->with('success', 'Recepcionista creado correctamente.');
    }


    public function show($id)
    {
        $recepcionista = Recepcionista::findOrFail($id);
        return view('recepcionistas.show', compact('recepcionista'));
    } 


    // public function edit($id)
    // {
    //     $recepcionista = Recepcionista::findOrFail($id);
    //     return view('recepcionistas.edit', compact('recepcionista'));
    // }

    public function edit($id)
    {
        if (Auth::user()->id_rol!=2){
            return redirect('Dashboard');
        }
        $recepcionista = Recepcionista::findOrFail($id);
        $id_user = $recepcionista->id_user;
        $usuario = Usuario::findOrFail($id_user);
        
        return view('recepcionistas.edit', compact('recepcionista', 'usuario'));
    }
    
    public function edit2($id)
    {
        if (Auth::user()->id_rol!=2){
            return redirect('Dashboard');
        }
        $recepcionista = Recepcionista::findOrFail($id);
        // return view('recepcionistas.destroy', compact('recepcionista'));
        return redirect()->route('recepcionistas.destroy', ['id' => $id]);
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

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nombres' => 'required|unique:recepcionistas,nombres,'.$id.',id_recepcionista',
    //         'ape_paterno' => 'required',
    //         'ape_materno' => 'required',
    //         'sexo' => 'required',
    //         'celular' => 'required',
    //         'dni' => 'required',
    //         'f_nacimiento' => 'required',
    //     ]);

    //     $recepcionista = Recepcionista::findOrFail($id);
    //     $recepcionista->update([
    //         'nombres' => $request->nombres,
    //         'ape_paterno' => $request->ape_paterno,
    //         'ape_materno' => $request->ape_materno,
    //         'sexo' => $request->sexo,
    //         'celular' => $request->celular,
    //         'dni' => $request->dni,
    //         'f_nacimiento' => $request->f_nacimiento,
    //         'updated_at' => now()
    //     ]);



    //     return redirect()->route('recepcionistas.index')->with('success', 'Recepcionista actualizado correctamente.');
    // }



    public function update(Request $request, $id)
    {
        if (Auth::user()->id_rol!=2){
            return redirect('Dashboard');
        }
        $request->validate([
            'nombres' => 'required|unique:recepcionistas,nombres,'.$id.',id_recepcionista',
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

        $recepcionista = Recepcionista::findOrFail($id);
        $id_user = $recepcionista->id_user;
        
        $recepcionista->update([
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

        return redirect()->route('recepcionistas.index')->with('success', 'Recepcionista actualizado correctamente.');
    }


    public function destroy($id)
    {
        // $recepcionista = Recepcionista::findOrFail($id);
        // $recepcionista->estado = 0;
        // $recepcionista->updated_at = now();
        // $recepcionista->save();

        if (Auth::user()->id_rol!=2){
            return redirect('Dashboard');
        }
        $recepcionista = Recepcionista::findOrFail($id);
        $idUsuario = $recepcionista->id_user;

        $recepcionista->estado = 0;
        $recepcionista->updated_at = now();
        $recepcionista->save();

        $usuario = Usuario::findOrFail($idUsuario);
        $usuario->estado = 0;
        $usuario->updated_at = now();
        $usuario->save();

        return redirect()->route('recepcionistas.index')->with('success', 'Recepcionista desactivado correctamente.');
    }



}
