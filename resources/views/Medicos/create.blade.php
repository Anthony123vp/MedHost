@extends('layoutssistema.navbar')
@section('content')


        
    <link rel="stylesheet" href="{{ asset('css/Recepcionista.css') }}">
    <div class="login-box">
        <p>Nuevo Médico</p>
        <form enctype="multipart/form-data" action="{{ route('medicos.store')}}" method="POST">
            @csrf
            <div class='contenedor_flex'>
                <div class="user-box">
                    <input required="" name="nombres" type="text" value="{{ old('nombres') }}">
                    <label>Nombres</label>
                    @error('nombres')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="user-box">
                    <input required="" name="ape_paterno" type="text" value="{{ old('ape_paterno') }}">
                    <label>Apellido Paterno</label>
                    @error('ape_paterno')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class='contenedor_flex'>
                <div class="user-box">
                    <input required="" name="ape_materno" type="text" value="{{ old('ape_materno') }}">
                    <label>Apellido Materno</label>
                    @error('ape_materno')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="user-box">
                    <input required="" name="dni" type="number" value="{{ old('dni') }}">
                    <label>DNI</label>
                    @error('dni')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class='contenedor_flex'>
                <div class="user-box">
                    <input required="" name="celular" type="number" value="{{ old('celular') }}">
                    <label>Celular</label>
                    @error('celular')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="user-box">
                    <input required="" name="f_nacimiento" type="date"  value="{{ old('f_nacimiento') }}">
                    <label>Fecha Nacimiento</label>
                    @error('f_nacimiento')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class='contenedor_flex'>
                <div class="user-box">
                    <select name="sexo" id="sexo" value="{{ old('sexo') }}">
                        <option style='#ccc' value="">  SEXO</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="X">Prefiero no decirlo</option>
                    </select>
                    @error('sexo')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="user-box">
                    <input required="" name="email" type="email" value="{{ old('email') }}">
                <label>Email</label>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class='contenedor_flex'>
                <div class="user-box">
                <input required="" name="password" type="password" value="{{ old('password') }}" >
                <label>Password</label>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="user-box">
                <input required="" name="password_2" type="password"  value="{{ old('password_2') }}">
                <label>Repite Password</label>
                @error('password_2')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class='contenedor_flex'>
                <div class="user-box">
                    <select name="id_especialidad" id="id_especialidad">
                        <option value="">ESPECIALIDADES</option>
                        @foreach ($especialidades as $especialidad)
                            <option value="{{ $especialidad->id_especialidad }}">{{ $especialidad->nombre }}</option>
                        @endforeach
                    </select>
                    @error('id_especialidad')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="user-box">
                    <select name="id_consultorio" id="id_consultorio">
                        <option value="">CONSULTORIO</option>
                    </select>
                    @error('id_consultorio')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="contenedor_flex" style="width:520px; margin:auto; ">
                <input class="imagen_medico" name="imagen" id="imagen"  required type="file"/>
            </div>
            @error('imagen')
                    <div class="error-message">{{ $message }}</div>
            @enderror
                
            <button class='boton_send' type="submit">
                <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" fill="currentColor"></path>
                    </svg>
                    </div>
                </div>
                <span>Enviar</span>
            </button>
        </form>
    </div>

@endsection

@section('scripts')
<script>
    const id_especialidad = document.getElementById('id_especialidad');
    const id_consultorio = document.getElementById('id_consultorio');
    
    id_especialidad.addEventListener('change',async(e)=>{
        const response = await fetch(`/api/Consultorios/${e.target.value}/especialidad`);
		const data = await response.json();
		let option = ``;
		data.forEach(element=>{
			option= option + `<option value="${element.id_consultorio}">${element.cod_habitacion}</option>`;
		});
		id_consultorio.innerHTML = option;
    });
</script>
@endsection