@extends('layoutssistema.navbar')
@section('linkcss')
<link rel="stylesheet" href="/css/formHorarios.css">
<link rel="stylesheet" href="/css/montserrat-font.css">
<link rel="stylesheet" href="/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
@endsection
@section('content')
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="{{ route('reservas.store') }}" method="post" id="myform">
			@csrf
				<div class="form-left">
					<h2>Paciente</h2>
					<div class="form-row">
						<input type="text"  name="dni" class="street" id="dni" placeholder="Dni" required>
					</div>
					
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text"  id="first_name" class="input-text" value="" placeholder="Nombre" required readonly>
						</div>
						<div class="form-row form-row-2">
							<input type="text"  id="ape_paterno" class="input-text" value="" placeholder="Apellido Paterno" required readonly>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" id="ape_materno" class="input-text" value="" placeholder="Apellido Materno" required readonly>
						</div>
						<div class="form-row form-row-2">
							<input type="text" id="seguro" class="input-text" value="" placeholder="Seguro" required readonly>
						</div>
					</div>
					<h2>Servicio</h2>
					<div class="form-row">
						<select id="servicio">
						    <option value="position" >Servicio</option>
						    @foreach ($servicios as $servicio)
								<option value="{{ $servicio->id_servicio }}">{{ $servicio->nombre}}</option>
							@endforeach
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-row">
						<select  id="especialidad">
						    <option value="position">Especialidad</option>
						    @foreach ($especialidades as $especialidad)
								<option value="{{ $especialidad->id_especialidad }}">{{ $especialidad->nombre}}</option>
							@endforeach
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-group">
						<div class="form-row form-row-3">
							<input type="text" name="precio" class="business" value="" id="precioServicio" placeholder="Precio" required readonly>
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
					<div class="form-row">
						<select id="medicos">
						    <option value="">Seleccione Medico</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
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
						<input type="text"  name="consultorio" id="consultorio" placeholder="Consultorio" readonly required>
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
	var servicio = document.getElementById('servicio');
	const especialidad = document.getElementById('especialidad');
	const especialidad_Servicio = document.getElementById('especilidad_Servicio');
	const precioServicio = document.getElementById('precioServicio');
	const medico = document.getElementById('medicos');
	const consultorio = document.getElementById('consultorio');

	especialidad.addEventListener('change',async(e)=>{
		var id_servicio = servicio.value;
		const response = await fetch(`/api/Reserva/${id_servicio}/${e.target.value}`);
		const data = await response.json();

		/*Rellena los tipos de servicios*/
			let options = ``;
			data.forEach(element=>{
				options= options + `<option value="${element.id_servicio_medhost}">${element.nombre}</option>`
			});
	
			especialidad_Servicio.innerHTML = options;
				/*Selecciona al primer tipo de servicio que aparece en el select option y muestr su precio*/
				const responsexd = await fetch(`/api/Reserva/${especialidad_Servicio.value}`);
				const dataxd = await responsexd.json();
				let option = ``;
				dataxd.forEach(element=>{
					option= option + `${element.precio} soles`
				});
				precioServicio.value = option;





		/*rellena los options del select medico*/
		let option_medico =  ``;
		const medicoresponse= await fetch(`/api/Medico/${e.target.value}`);
		const medicos = await medicoresponse.json()
		medicos.forEach(element=>{
			option_medico= option_medico + `<option value="${element.id_medico}">${element.nombres},${element.ape_paterno}</option>`
		});
		medico.innerHTML = option_medico;


		/*Selecciona al primer medico que aparece en el select option y muestra sus horarios*/
		const responseHorario = await fetch(`/api/Medico/${medico.value}/Horarios`);
		const datahorario = await responseHorario.json();
		let optionhorario = ``;
		datahorario.forEach(element=>{
			optionhorario= optionhorario + `<option value="${element.id_medico_horario}">${element.fecha}->${element.hora_inicio} - ${element.hora_final}</option>`
		});
		medico_horarios.innerHTML = optionhorario;

		/*Muestra el consultorio del primer medico seleccionado que aparece*/
		let consultorio_disponible='';
		const consultorioresponse= await fetch(`/api/Consultorios/${medico.value}`);
		const consultorios = await consultorioresponse.json()
		consultorio.value = consultorios['cod_habitacion'];
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


	/*Informacion del Paciente*/
	const dni = document.getElementById('dni');
	const first_name = document.getElementById('first_name');
	const ape_paterno = document.getElementById('ape_paterno');
	const ape_materno = document.getElementById('ape_materno');
	const seguro = document.getElementById('seguro');
	
	dni.addEventListener("keyup", async(event) => {
		const response = await fetch(`/api/Paciente/${event.target.value}/Reserva`);
		const data = await response.json();
		let nombre_val = ``;
		let ape_paterno_val = ``;
		let ape_materno_val = ``;
		let seguro_val = ``;
		data.forEach(element=>{
			nombre_val = nombre_val + `${element.nombres}`;
			ape_paterno_val = ape_paterno_val + `${element.ape_paterno}`;
			ape_materno_val = ape_materno_val + `${element.ape_materno}`;
			seguro_val = seguro_val + `${element.nombre}`;
		});
		first_name.value = nombre_val;
		ape_paterno.value =ape_paterno_val;
		ape_materno.value =ape_materno_val;
		seguro.value = seguro_val;
	});

	/*Horarios del Medico Seleccionado*/
	const medico_horarios = document.getElementById('medico_horarios');
	medico.addEventListener("change",async(e)=>{
		const response = await fetch(`/api/Medico/${e.target.value}/Horarios`);
		const data = await response.json();
		let option = ``;
		data.forEach(element=>{
			option= option + `<option value="${element.id_medico_horario}">${element.fecha}->${element.hora_inicio} - ${element.hora_final}</option>`
		});
		medico_horarios.innerHTML = option;

		/*Muestra el consultorio del medico seleccionado*/
		let consultorio_disponible='';
		const consultorioresponse= await fetch(`/api/Consultorios/${medico.value}`);
		const consultorios = await consultorioresponse.json()
		consultorio.value = consultorios['cod_habitacion'];
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