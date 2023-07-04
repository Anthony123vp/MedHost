@extends('layoutssistema.navbar')
@section('linkcss')
<link rel="stylesheet" href="/css/formHorarios.css">
<link rel="stylesheet" type="text/css" href="/css/montserrat-font.css">
<link rel="stylesheet" type="text/css" href="/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
@endsection
@section('content')
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="{{ route('Horario.store')}}" method="post" id="myform">
			@csrf
				<div class="form-left">
					<h2>Programar Horario</h2>
					<div class="form-row">
						<input type="date" name="fecha">
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<select name="hora_inicio" id="hora_inicio" required>
								@for ($hour = 0; $hour < 24; $hour++)
									@for ($minute = 0; $minute < 60; $minute += 30)
										<option value="{{ sprintf('%02d', $hour) }}:{{ sprintf('%02d', $minute) }}">{{ sprintf('%02d', $hour) }}:{{ sprintf('%02d', $minute) }}</option>
									@endfor
								@endfor
							</select>
						</div>
						<div class="form-row form-row-2">
							<select name="hora_final" id="hora_final" required>
								@for ($hour = 0; $hour < 24; $hour++)
									@for ($minute = 0; $minute < 60; $minute += 30)
										<option value="{{ sprintf('%02d', $hour) }}:{{ sprintf('%02d', $minute) }}">{{ sprintf('%02d', $hour) }}:{{ sprintf('%02d', $minute) }}</option>
									@endfor
								@endfor
							</select>
						</div>
					</div>
                    <div class="form-row-last">
						<input type="submit" name="register" class="register" value="Registrar">
					</div>

				</div>
				<div class="form-right">
				</div>
			</form>
		</div>
	</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		$('#hora_inicio').change(function() {
			var horaInicio = $(this).val();
			$('#hora_final option').each(function() {
				var horaFinal = $(this).val();
				if (horaFinal <= horaInicio) {
					$(this).hide();
				} else {
					$(this).show();
				}
			});
		});
	});
</script>
<!-- id="appt" -->