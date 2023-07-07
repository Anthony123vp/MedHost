@extends('layoutssistema.navbar')
@section('linkcss')
<link rel="stylesheet" href="/css/formHorarios.css">
<link rel="stylesheet" href="/css/montserrat-font.css">
<link rel="stylesheet" href="/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
@endsection
@section('content')
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="{{ route('PacienteReserva.store',$paciente->id_paciente) }}" method="post" id="myform">
			@csrf
				<div class="form-left">
					<h2>Paciente</h2>
					<div class="form-row">
						<input type="text"  value="{{$paciente->dni}}" class="street" id="dni" placeholder="Dni" required readonly>
					</div>
					
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text"  id="first_name" class="input-text" value="{{ $paciente->nombres}}" placeholder="Nombre" required readonly>
						</div>
						<div class="form-row form-row-2">
							<input type="text"  id="ape_paterno" class="input-text" value="{{ $paciente->ape_paterno}}" placeholder="Apellido Paterno" required readonly>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" id="ape_materno" class="input-text" value="{{ $paciente->ape_materno }}" placeholder="Apellido Materno" required readonly>
						</div>
						<div class="form-row form-row-2">
							<input type="text" id="seguro" class="input-text" value="{{ $paciente->insurance->nombre }}" placeholder="Seguro" required readonly>
						</div>
					</div>
					<h2>Servicio</h2>
                    <div class="form-row">
						<select  id="especialidad">
						    <option value="{{$medico->especialidad->id_especialidad}}" >{{$medico->especialidad->nombre}}</option>

				
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-row">
						<select id="servicio">
						    <option value="position" >Servicio</option>
						    @foreach ($servicios as $servicio)
                                <option value="{{$servicio->id_servicio}}" >{{$servicio->nombre}}</option>
                            @endforeach
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					
					<div class="form-group">
						<div class="form-row form-row-3">
							<input type="text" class="business" value="" id="precioServicio" placeholder="Precio" required readonly>
						</div>
						<div class="form-row form-row-4">
							<select name="servicio_medhost" id="especilidad_Servicio">
							    <option value="employees">Tipo Servicio</option>
								
							</select>
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
					</div>
					<br><br>
				</div>
				<div class="form-right">
					<h2>Medico</h2>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text"  id="first_name" value="{{ $medico->nombres }}" class="input-text" value="" placeholder="Nombre" required readonly>
						</div>
						<div class="form-row form-row-2">
							<input type="text"  id="ape_paterno" value="{{ $medico->ape_paterno}}" class="input-text" value="" placeholder="Apellido Paterno" required readonly>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" id="ape_materno" value="{{ $medico->ape_materno}}" class="input-text" value="" placeholder="Apellido Materno" required readonly>
						</div>
					</div>
					<br>
					<div class="form-row">
						<select name="medico_horario" id="medico_horarios">
						    <option value="">Horarios Disponibles</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<h2>Modalidad</h2>
					<div class="form-row">
						<select  id="modalidad" name='modalidad'>
						    <option value="" >Modalidad</option>
							<option value="virtual">Virtual</option>
							<option value="presencial">Presencial</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<h2 id="divConsultorio">Consultorio</h2>
					<div id="divConsultorio2" class="form-row">
						<input type="text" value="{{$medico->consultorio->cod_habitacion}}" id="consultorio" placeholder="Consultorio" readonly required>
					</div>
					<div class="form-row-last">
                        <div class="boton">
						    <!-- <input type="submit" class="register" value="Programar"> -->
							<!-- <input type="reset" class="cancelar" value="Limpiar"> -->
							<button class="cancelar_boton" type="submit" >Programar</button>
							<button class="cancelar_boton" type="reset" >Limpiar</button>
					    </div>
                    </div>
					<br>
				</div>
				
			</form>
		</div>
	</div> 
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	const servicio = document.getElementById('servicio');
	const especialidad = document.getElementById('especialidad');
	const especialidad_Servicio = document.getElementById('especilidad_Servicio');
	const precioServicio = document.getElementById('precioServicio');
	const medico = document.getElementById('medicos');
	const consultorio = document.getElementById('consultorio');

    let medico_bd = {!! json_encode($medico, JSON_HEX_TAG) !!};
    window.addEventListener('load', async(e)=>{
        const response = await fetch(`/api/Medico/${medico_bd["id_consultorio"]}/Horarios`);
		const data = await response.json();
		let option = ``;
		data.forEach(element=>{
			option= option + `<option value="${element.id_medico_horario}">${element.fecha}->${element.hora_inicio} - ${element.hora_final}</option>`
		});
		medico_horarios.innerHTML = option;
    });


        
    servicio.addEventListener('change',async(e)=>{
        const response = await fetch(`/api/Reserva/${e.target.value}/${especialidad.value}`)
        const data = await response.json();
        let options = ``;
			data.forEach(element=>{
				options= options + `<option value="${element.id_servicio_medhost}">${element.nombre}</option>`
		});
        especialidad_Servicio.innerHTML=options;
        
        /*Selecciona al primer tipo de servicio que aparece en el select option y muestr su precio*/
				const responsexd = await fetch(`/api/Reserva/${especialidad_Servicio.value}`);
				const dataxd = await responsexd.json();
				let option = ``;
				dataxd.forEach(element=>{
					option= option + `${element.precio} soles`
				});
				precioServicio.value = option;

    });



	especialidad_Servicio.addEventListener('change',async(e)=>{
		const response = await fetch(`/api/Reserva/${e.target.value}`);
		const data = await response.json();
		let option = ``;
		data.forEach(element=>{
			option= option + `${element.precio} soles`
		});
		precioServicio.value = option;
	});





	$(document).ready(function() {
		$("#modalidad").change(function() {
			var modalidad = $(this).val();
			if (modalidad === "virtual") {
				$("#divConsultorio").hide();
				$("#divConsultorio2").hide();
				$(".boton").css("margin-top", "100px");
			} else {
				$("#divConsultorio").show();
				$("#divConsultorio2").show();
				$(".boton").css("margin-top", "7px");
			}
		});
	});
</script>

@endsection