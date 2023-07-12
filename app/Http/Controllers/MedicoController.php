<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Usuario;
use App\Models\Medico;
use App\Models\Especialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicoController extends Controller
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
        $medicos = Medico::with('especialidad','consultorio')->get();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        if (Auth::user()->id_rol!=2){
            return redirect('Dashboard');
        }
        $especialidades = Especialidad::all();
        return view('medicos.create', compact('especialidades'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->id_rol!=2){
            return redirect('Dashboard');
        }
        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_2' => 'required',
        ]);

        $usuario = Usuario::create([
            'email' => $request->input('email'),
            'id_rol' =>4,
            'password' => bcrypt($request->input('password')),
            'password_2' => bcrypt($request->input('password_2')),
        ]);
        $id_usuarios = $usuario->id_user;

        $request->validate([
            'dni' => 'required',
            'id_especialidad' => 'required',
            'id_consultorio' => 'required',
            'nombres' => 'required',
            'ape_paterno' => 'required',
            'ape_materno' => 'required',
            'sexo' => 'required',
            'celular' => 'required',
            'f_nacimiento' => 'required',
        ]);



        $imagen = $request->file('imagen');
        $rutaGuardarImg = 'medicos_imagenes/';
        $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
        $imagen->move($rutaGuardarImg, $imagenProducto);
        $imagen_ruta = "$imagenProducto";
        

        Medico::create([
            'id_user' => $id_usuarios,
            'id_especialidad' => $request->id_especialidad,
            'id_consultorio' => $request->id_consultorio,
            'dni' => $request->dni,
            'nombres' => $request->nombres,
            'ape_paterno' => $request->ape_paterno,
            'ape_materno' => $request->ape_materno,
            'sexo' => $request->sexo,
            'f_nacimiento' => $request->f_nacimiento,
            'celular' => $request->celular,
            'imagen' => $imagen_ruta ,
        ]);
        
        $consultorio = Consultorio::where('id_consultorio', $request->id_consultorio)->FirstOrFail();
        $consultorio->estado=0;
        $consultorio->save();
        
        return redirect()->route('medicos.index')->with('success', 'Medico creado correctamente.');
    }


    public function show($id)
    {
        if (Auth::user()->id_rol!=2){
            return redirect('Dashboard');
        }
        $medico = Medico::findOrFail($id);
        return view('medicos.show', compact('medico'));

    } 


    public function edit($id)
    {
        if (Auth::user()->id_rol!=2){
            return redirect('Dashboard');
        }

        $medico = Medico::findOrFail($id);
        $id_user = $medico->id_user;
        $usuario = Usuario::findOrFail($id_user);
        $especialidades = Especialidad::all();
        
        return view('medicos.edit', compact('medico', 'usuario','especialidades'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required|unique:medicos,nombres,'.$id.',id_medico',
            'id_especialidad' => 'required',
            'id_consultorio' => 'required',
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

        $medicos = Medico::findOrFail($id);
        $id_user = $medicos->id_user;
        $id_consultoriovalidar=$medicos->id_consultorio;
        $medicos->update([
            'nombres' => $request->nombres,
            'id_especialidad' => $request->id_especialidad,
            'id_consultorio' => $request->id_consultorio,
            'ape_paterno' => $request->ape_paterno,
            'ape_materno' => $request->ape_materno,
            'sexo' => $request->sexo,
            'celular' => $request->celular,
            'dni' => $request->dni,
            'f_nacimiento' => $request->f_nacimiento,
            'updated_at' => now()
        ]);

        if($id_consultoriovalidar!=$request->id_consultorio){
            $consultorio = Consultorio::where('id_consultorio', $id_consultoriovalidar)->FirstOrFail();
            $consultorio->estado=1;
            $consultorio->save();

            $consultorio = Consultorio::where('id_consultorio', $request->id_consultorio)->FirstOrFail();
            $consultorio->estado=0;
            $consultorio->save();
        }


        $usuario = Usuario::findOrFail($id_user);
        $usuario->update([
            'email' => $request->email,
            'password' => $request->password,
            'password_2' => $request->password_2,
            'updated_at' => now()
        ]);

        return redirect()->route('medicos.index')->with('success', 'Medico actualizado correctamente.');
    }

    public function destroy($id)
    {
        if (Auth::user()->id_rol!=2){
            return redirect('Dashboard');
        }
        $medico = Medico::findOrFail($id);
        $idUsuario = $medico->id_user;

        $medico->estado = 0;
        $medico->updated_at = now();
        $medico->save();

        $usuario = Usuario::findOrFail($idUsuario);
        $usuario->estado = 0;
        $usuario->updated_at = now();
        $usuario->save();


        $consultorio = Consultorio::findOrFail($medico->id_consultorio);
        $consultorio->estado=1;
        $consultorio->save();

        return redirect()->route('medicos.index')->with('success', 'Medico desactivado correctamente.');
    }
}
