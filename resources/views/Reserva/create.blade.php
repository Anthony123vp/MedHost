@extends('layoutssistema.navbar')
@section('linkcss')
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="/css/Paciente_Reserva.css">
@endsection
@section('content')
	 <section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
								<div style="display:flex;justify-content:space-between;">
									<h3 class="mb-4">Reservar Cita</h3>
									<h3 class="mb-4" id="precioServicio">Precio</h3>
								</div>
									

									<div id="form-message-warning" class="mb-4"></div>
									<div id="form-message-success" class="mb-4">
										Your message was sent, thank you!
									</div>
									<form method="POST" action="{{route('reservas.store')}}"  class="contactForm">
									@csrf
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="email">Modalidad</label>
													<select class="form-control" name="modalidad">
														<option value="presencial">Presencial</option>
														<option value="virtual">Virtual</option>

													</select>
												</div>
											</div>
											
											<div class="col-md-3">
												<div class="form-group">
													<label class="label" for="email">Servicio</label>
													<select class="form-control" id="servicio">
														<option value="" disabled selected>Seleccione una opcion
														</option>
														@foreach ($servicios as $servicio)
															<option value="{{$servicio->id_servicio}}">{{$servicio->nombre}}</option>
														@endforeach
														

													</select>
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group">
													<label class="label" for="email">Especialidad</label>
													<select class="form-control" id="especialidad">
														<option value="" disabled selected>Seleccione una opcion
														</option>
														@foreach ($especialidades as $especialidad)
															<option value="{{$especialidad->id_especialidad}}">{{$especialidad->nombre}}</option>
														@endforeach
														

													</select>
												</div>
											</div>
										</div>

										<div class="row">
											
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="email">Opciones del Servicio</label>
													<select class="form-control" id="especilidad_Servicio" name="servicio_medhost">
														<option value="" disabled selected>Selecciona su servicio
														</option>
														
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="label" for="email">Medico</label>
													<select class="form-control" id="medicos">
														<option value="" disabled selected>Seleccione el Medico</option>
														
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="label" for="email">Horarios</label>
													<select class="form-control" name="medico_horario" id="medico_horarios">
														<option value="" disabled selected>Seleccione el horario
														</option>
														
													</select>
												</div>
											</div>
										</div>
										<br>
										<h3 class="mb-4">Paciente</h3>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Dni</label>
													<input type="text" class="form-control" name="dni" id="dni"
														placeholder="Name" value="" >
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Nombres</label>
													<input type="text" class="form-control"  id="nombres"
														placeholder="Name" value="" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Apellidos</label>
													<input type="text" class="form-control"  id="apellidos"
														placeholder="Apellido Paterno" value="" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Seguro</label>
													<input type="text" class="form-control"  id="seguro"
														placeholder="Apellido Materno" value="" readonly>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Reservar" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch" style="background-color:#345B63!important">
								<div class="info-wrap bg-primary w-100 p-md-5 p-4" style="display:none" id="doctor" >
									<h3>Medico</h3>
									<p class="mb-4" id="especialidad_medico">Especialista en </p>

									<div class="imagen_medico">
										<img id="foto_medico" src="/medicos_imagenes">
										<p class="mb-4" id="nombre_medico">"Nombre del Medico</p>
									</div>
									

									<div class="dbox w-100 d-flex align-items-start">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-graduation-cap"></span>
										</div>
										<div class="text pl-3">
											<p><span>Estudios:</span> Universidad Nacional Mayor de San Marcos.
											</p>
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-phone"></span>
										</div>
										<div class="text pl-3">
											<p><span>Phone:</span> <a href="tel" id="telefono_medico">962354723</a></p> 
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-linkedin-square"></span>
										</div>
										<div class="text pl-3">
											<p id="consultorio_medico"></p>
										</div>
									</div>
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
	const medico_horarios = document.getElementById('medico_horarios');
	const doctor = document.getElementById('doctor');
	/* Informacion Id Medico*/
	const nombre_medico = document.getElementById('nombre_medico');
	const telefono_medico = document.getElementById('telefono_medico');
	const especialidad_medico = document.getElementById('especialidad_medico');
	const foto_medico = document.getElementById('foto_medico');
	const consultorio_medico = document.getElementById('consultorio_medico');
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
				precioServicio.innerText = option;





		/*rellena los options del select medico*/
		let option_medico =  ``;
		const medicoresponse= await fetch(`/api/Medico/${e.target.value}`);
		const medicos = await medicoresponse.json()
		medicos.forEach(element=>{
			option_medico= option_medico + `<option value="${element.id_medico}">${element.nombres},${element.ape_paterno}</option>`
		});
		medico.innerHTML = option_medico;


		/* Muestra la Informacion del Medico en la parte Izquierda*/
		
	
		const responseMedico = await fetch(`/api/Medico/${medico.value}/Informacion`);
		const medico_informacion = await responseMedico.json();
		foto_medico.src='/medicos_imagenes/'+medico_informacion["imagen"];
		nombre_medico.innerHTML = medico_informacion["nombres"]+' '+medico_informacion["ape_paterno"]+' '+medico_informacion["ape_materno"];
		especialidad_medico.innerText = "Especialista en" +' '+medico_informacion["especialidad"]["nombre"];
		telefono_medico.innerText = medico_informacion["celular"];
		consultorio_medico.innerHTML = '<span>Consultorio: </span>'+ medico_informacion["consultorio"]["cod_habitacion"];
		doctor.style.display="block";

		/*Selecciona al primer medico que aparece en el select option y muestra sus horarios*/
		const responseHorario = await fetch(`/api/Medico/${medico.value}/Horarios`);
		const datahorario = await responseHorario.json();
		let optionhorario = ``;
		datahorario.forEach(element=>{
			optionhorario= optionhorario + `<option value="${element.id_medico_horario}">${element.fecha}->${element.hora_inicio} - ${element.hora_final}</option>`;
		});
		medico_horarios.innerHTML = optionhorario;

	});

	especialidad_Servicio.addEventListener('change',async(e)=>{
		const response = await fetch(`/api/Reserva/${e.target.value}`);
		const data = await response.json();
		let option = ``;
		data.forEach(element=>{
			option= option + `${element.precio} soles`
		});
		precioServicio.innerText = option;
	});


	/*Informacion del Paciente*/
	const dni = document.getElementById('dni');
	const first_name = document.getElementById('nombres');
	const ape_paterno = document.getElementById('ape_paterno');
	const ape_materno = document.getElementById('ape_materno');
	const seguro = document.getElementById('seguro');
	
	dni.addEventListener("keyup", async(event) => {
		const response = await fetch(`/api/Paciente/${event.target.value}/Reserva`);
		const data = await response.json();
		let nombre_val = ``;
		let apellidos_val = ``;
		let seguro_val = ``;
		data.forEach(element=>{
			nombre_val = nombre_val + `${element.nombres}`;
			apellidos_val = apellidos_val + `${element.ape_paterno}  ${element.ape_materno}`;
			seguro_val = seguro_val + `${element.nombre}`;
		});
		first_name.value = nombre_val;
		apellidos.value =apellidos_val;
		seguro.value = seguro_val;
	});

	/*Horarios del Medico Seleccionado*/
	medico.addEventListener("change",async(e)=>{
		/*Mostrando Info del Medico*/
		const responseMedico = await fetch(`/api/Medico/${e.target.value}/Informacion`);
		const medico_informacion = await responseMedico.json();
		foto_medico.src='/medicos_imagenes/'+medico_informacion["imagen"];
		nombre_medico.innerHTML = medico_informacion["nombres"]+' '+medico_informacion["ape_paterno"]+' '+medico_informacion["ape_materno"];
		especialidad_medico.innerText = "Especialista en" +' '+medico_informacion["especialidad"]["nombre"];
		telefono_medico.innerText = medico_informacion["celular"];

		/*Mosrtando horarios del medico seleccionado*/
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