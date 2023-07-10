@extends('layoutssistema.navbar')
@section('linkcss')
    <link rel="stylesheet" href="/css/cardMedico.css">
@endsection
@section('content')
<div class="CajaMedicos">
    <select id="especialidad">
        <option value="" disabled selected>Seleccione la especialidad</option>
        @foreach ($especialidades as $especialidad)
            <option value="{{$especialidad->id_especialidad}}">{{$especialidad->nombre}}</option>"
        @endforeach
    </select>
    <br>
    <br>

    <div class="Medicos" id="medicos">
    @foreach ($medicos as  $medico)
        <div class="myCard" id="Medico">
                <div class="innerCard">
                    <div class="frontSide">
                        <div class="medico">
                            <h2>{{ $medico->especialidad->nombre}}</h2>
                            <div class="imagen"><img src="/medicos_imagenes/{{$medico->imagen}}" alt=""></div>
                            <h3>{{ $medico->nombres}} {{$medico->ape_paterno}}</h3>
                            <div style="color:#fff;" class="btn-especialidad">Doctor</div>
                            <div class="Informacion-Doctor">
                                <p><i class="fa-solid fa-hospital"></i> Años de Experiencia: <b>10</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="backSide">
                        <div class="medico-informacion">
                            <h2>MedHost</h2>
                            <p style="text-align: justify; font-weight:100;">Lorem, os ut quas! Inventore vitae eveniet officia dolores saepe expedita aperiam ipsum aspernatur tempora veniam. Odio! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam odit minima voluptas, sed fugit unde hic est officiis architecto consectetur consequuntur, quas sequi explicabo, praesentium</p>
                            <a href="{{ route('PacienteCreateCita',$medico->id_medico) }}">Escoger</a>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
    </div>
<div>
@endsection
@section('scripts')
<script>
	const especialidad = document.getElementById('especialidad');
    const medicos = document.getElementById('medicos');   
	
    especialidad.addEventListener('change',async(e)=>{
        const response = await fetch(`/api/Medico/${e.target.value}`)
        const data = await response.json();
        let card = ``;
			data.forEach(element=>{
				card= card + `<div class="myCard" id="Medico">
                <div class="innerCard">
                    <div class="frontSide">
                        <div class="medico">
                            <h2>${element.especialidad['nombre']}</h2>
                            <div class="imagen"><img src="/medicos_imagenes/${element.imagen}" alt=""></div>
                            <h3>${element.nombres} ${element.ape_paterno}</h3>
                            <div class="btn-especialidad">Doctor</div>
                            <div class="Informacion-Doctor">
                                <p><i class="fa-solid fa-hospital"></i> Años de Experiencia: <b>10</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="backSide">
                        <div class="medico-informacion">
                            <h2>MedHost</h2>
                            <p style="text-align: justify; font-weight:100;">Lorem, os ut quas! Inventore vitae eveniet officia dolores saepe expedita aperiam ipsum aspernatur tempora veniam. Odio! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam odit minima voluptas, sed fugit unde hic est officiis architecto consectetur consequuntur, quas sequi explicabo, praesentium</p>
                            <a href="/ReservaPaciente/create/${element.id_medico}">Escoger</a>
                        </div>
                    </div>
                </div>
        </div>`;

		});
        medicos.innerHTML=card;
        
    
	});
</script>

@endsection