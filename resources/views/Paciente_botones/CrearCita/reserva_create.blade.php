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
									<form method="POST" action="{{ route('PacienteReserva.store',$paciente->id_paciente)}}" class="contactForm">
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
											<div class="col-md-6">
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
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="email">Horarios</label>
													<select class="form-control" name="medico_horario" id="medicos_horarios">
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
													<input type="text" class="form-control" name="name" id="name"
														placeholder="Name" value="{{$paciente->dni}}" readonly>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Nombres</label>
													<input type="text" class="form-control" name="name" id="name"
														placeholder="Name" value="{{$paciente->nombres}}" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Apellidos</label>
													<input type="text" class="form-control" name="name" id="name"
														placeholder="Name" value="{{$paciente->ape_paterno}} {{$paciente->ape_materno}}" readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Seguro</label>
													<input type="text" class="form-control" name="name" id="name"
														placeholder="Name" value="{{$paciente->insurance->nombre}}" readonly>
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
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-md-5 p-4">
									<h3>Medico</h3>
									<p class="mb-4">Especialista en {{ $medico->especialidad->nombre}}</p>

									<div class="imagen_medico">
										<img src="/medicos_imagenes/{{$medico->imagen}}">
										<p class="mb-4">{{$medico->nombres}} {{$medico->ape_paterno}} {{$medico->ape_materno}}</p>
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
											<p><span>Phone:</span> <a href="tel://{{$medico->celular}}">+51 {{$medico->celular}}</a></p> 
										</div>
									</div>
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-linkedin-square"></span>
										</div>
										<div class="text pl-3">
											<p><a
													href="mailto:info@yoursite.com">info@yoursite.com</a></p>
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
	const servicio = document.getElementById('servicio');
	const especialidad = document.getElementById('especialidad');
	const especialidad_Servicio = document.getElementById('especilidad_Servicio');
	const precioServicio = document.getElementById('precioServicio');
	const medico = document.getElementById('medicos');
	const consultorio = document.getElementById('consultorio');
	const medico_horarios = document.getElementById('medicos_horarios');
    let medico_bd = {!! json_encode($medico, JSON_HEX_TAG) !!};
   
	 window.addEventListener('load', async(e)=>{
        const response = await fetch(`/api/Medico/${medico_bd["id_medico"]}/Horarios`);
		const data = await response.json();
		let option = `<option value=""disabled selected>Seleccione una opcion</option>`;
		data.forEach(element=>{
			option= option + `<option value="${element.id_medico_horario}">${element.fecha} : ${element.hora_inicio} - ${element.hora_final}</option>`
		});
		medico_horarios.innerHTML = option;
    });

        
    servicio.addEventListener('change',async(e)=>{
        const response = await fetch(`/api/Reserva/${e.target.value}/${medico_bd["id_especialidad"]}`)
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
				precioServicio.innerText = option;

    });



	especialidad_Servicio.addEventListener('change',async(e)=>{
		const response = await fetch(`/api/Reserva/${e.target.value}`);
		const data = await response.json();
		let option = ``;
		data.forEach(element=>{
			option= option + `${element.precio} soles`
		});
		precioServicio.innerText  = option;
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