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
                </div>
                <div class="user-box">
                    <input required="" name="ape_paterno" type="text" value="{{ old('ape_paterno') }}">
                    <label>Apellido Paterno</label>
                </div>
            </div>
            <div class='contenedor_flex'>
                <div class="user-box">
                    <input required="" name="ape_materno" type="text" value="{{ old('ape_materno') }}">
                    <label>Apellido Materno</label>
                </div>
                <div class="user-box">
                    <input required="" name="dni" type="number" value="{{ old('dni') }}">
                    <label>DNI</label>
                </div>
            </div>
            <div class='contenedor_flex'>
                <div class="user-box">
                    <input required="" name="celular" type="number" value="{{ old('celular') }}">
                    <label>Celular</label>
                </div>
                <div class="user-box">
                    <input required="" name="f_nacimiento" type="date"  value="{{ old('f_nacimiento') }}">
                    <label>Fecha Nacimiento</label>
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
                </div>
                <div class="user-box">
                    <input required="" name="email" type="email" value="{{ old('email') }}">
                <label>Email</label>
                </div>
            </div>
            <div class='contenedor_flex'>
                <div class="user-box">
                <input required="" name="password" type="password" value="{{ old('password') }}" >
                <label>Password</label>
                </div>
                <div class="user-box">
                <input required="" name="password_2" type="password"  value="{{ old('password_2') }}">
                <label>Repite Password</label>
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
                </div>
                
                <div class="user-box">
                    <select name="id_consultorio" id="id_consultorio">
                        <option value="">CONSULTORIO</option>
                    </select>
                </div>
                <input name="imagen" id="imagen" type="file"/>
            </div>
            
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