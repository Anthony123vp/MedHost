@extends('layoutssistema.navbar')
@section('linkcss')
<link rel="stylesheet" href="/css/citas_paciente.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="citas_pendientes">
    @foreach ($citas as $cita)
    @if ( $cita->servicio == 'Cita_Medica')

          @if ( $cita->pago_pendiente_estado == 1 && $cita->pago_estado == 0)
            <!-- <div class="loader">
              <div class="leaf"></div>
              <div class="leaf"></div>
              <div class="leaf"></div>
              <div style='margin-left:10px;color:#550e0e;border-top:1px solid #550e0e;border-bottom:1px solid #550e0e;'>Cita con Pago Pendiente</div>
            </div> -->
          @elseif ( $cita->pago_pendiente_estado == 0 && $cita->pago_estado == 1)
            <!-- <div class="loader2">
                <div class="leaf2"></div>
                <div class="leaf2"></div>
                <div class="leaf2"></div>
                <div style='margin-left:10px;color:#327d3c;border-top:1px solid #327d3c;border-bottom:1px solid #327d3c;'>Cita Pagada Correctamente</div>
              </div> -->
          <div class="card">
        <div class="header">
          <div>
            <a class="title">
              {{$cita->serv_exacto}}
            </a>
            <p class="name">{{$cita->servicio}} en {{$cita->especialidad}}</p>
          </div>
          <a href="{{ route('citas_programadas.edit', ['id' => $cita->id_paciente, 'id2' => $cita->id_reserva])}}"><div class="imagen_boton"><i class='bx bxs-donate-heart' ></i></div></a>
        </div>
          <p class="description">
            <b>Paciente |</b> {{$cita->paciente}}
          </p>
          <div class="rating">
            <p class="description">
              <b>Medico |</b> {{$cita->medico}}
            </p>
            <input checked="" type="radio" id="star5" name="rate" value="5">
            <label for="star5" title="text"></label>
            <input type="radio" id="star4" name="rate" value="4">
            <label for="star4" title="text"></label>
            <input type="radio" id="star3" name="rate" value="3">
            <label for="star3" title="text"></label>
            <input type="radio" id="star2" name="rate" value="2">
            <label for="star2" title="text"></label>
            <input type="radio" id="star1" name="rate" value="1">
            <label for="star1" title="text"></label>
          </div>
          <!-- -------------------- -->
          <!-- -------------------- -->
        <dl class="post-info">
          <div class="cr">
            <dt class="dt">Fecha</dt>
            <dd class="dd">{{ date( "d/m/y", strtotime($cita->fecha))}} </dd>
          </div>
          <div class="cr">
            <dt class="dt">Hora</dt>
            <dd class="dd">{{ date( "g:i a", strtotime($cita->hora_inicio))}} </dd>
          </div>
          <div class="cr">
            <dt class="dt">Duracion</dt>
            <dd class="dd">30 minutos</dd>
          </div>
          <div class="cr">
            @if ( $cita->modalidad == 'virtual')
            <dt class="dt">Modalidad</dt>
            <dd class="dd">Virtual - <b style='color:green;'>Whatsapp</b> </dd>
            @elseif( $cita->modalidad == 'presencial')     
            <dt class="dt">Consultorio</dt>
            <dd class="dd">{{$cita->cod_habitacion}}</dd>
            @endif
          </div>
          <div class="cr">
            <dt class="dt">Celular</dt>
            <dd class="dd">(+51 {{$cita->celular}})</dd>
          </div>
          <div class="cr">
            <dt class="dt">Dirección</dt>
            <dd class="dd">Av. Javier Prado Este 1066, San Isidro 15036</dd>
          </div>
        </dl>
        @if ( $cita->modalidad == 'virtual')
        <p class="description">
          <b>Iniciar Chat &  VideoLlamada - Whatsapp |</b>
          <a style='margin-left:10px;' href="https://wa.me/51{{ $cita->celular }}?text={{ urlencode('Doctor '.$cita->medico.', ya me encuentro listo para iniciar la video-llamada. 🏥🩺') }}" class="whatsapp" target="_blank">

            <i class="fa fa-whatsapp whatsapp-icon"></i>
          </a>
        </p>
          
        @elseif( $cita->modalidad == 'presencial')   
        @endif
          @endif
        
      </div> 
      
      @elseif($cita->servicio == 'Examen')   
      <!-- -------------------------------------------------- -->
      <div class="card">
        <div class="header">
          <div>
            <a class="title">
              {{$cita->serv_exacto}}
            </a>
            <p class="name">{{$cita->servicio}} en {{$cita->especialidad}}</p>
          </div>
          <a href="{{ route('examenes.edit', ['id' => $cita->id_paciente, 'id2' => $cita->id_reserva])}}"><div class="imagen_boton2"><i class='bx bxs-donate-heart'></i></div></a>
        </div>
          <p class="description">
            <b>Paciente |</b> {{$cita->paciente}}
          </p>
          <div class="rating">
            <p class="description">
              <b>Medico |</b> {{$cita->medico}}
            </p>
            <input checked="" type="radio" id="star5" name="rate" value="5">
            <label for="star5" title="text"></label>
            <input type="radio" id="star4" name="rate" value="4">
            <label for="star4" title="text"></label>
            <input type="radio" id="star3" name="rate" value="3">
            <label for="star3" title="text"></label>
            <input type="radio" id="star2" name="rate" value="2">
            <label for="star2" title="text"></label>
            <input type="radio" id="star1" name="rate" value="1">
            <label for="star1" title="text"></label>
          </div>
          <!-- -------------------- -->
          <!-- -------------------- -->
        <dl class="post-info">
          <div class="cr">
            <dt class="dt">Fecha</dt>
            <dd class="dd">{{ date( "d/m/y", strtotime($cita->fecha))}} </dd>
          </div>
          <div class="cr">
            <dt class="dt">Hora</dt>
            <dd class="dd">{{ date( "g:i a", strtotime($cita->hora_inicio))}} </dd>
          </div>
          <div class="cr">
            <dt class="dt">Duracion</dt>
            <dd class="dd">30 minutos</dd>
          </div>
          <div class="cr">
            @if ( $cita->modalidad == 'virtual')
            <dt class="dt">Modalidad</dt>
            <dd class="dd">Virtual - <b style='color:green;'>Whatsapp</b> </dd>
            @elseif( $cita->modalidad == 'presencial')     
            <dt class="dt">Consultorio</dt>
            <dd class="dd">{{$cita->cod_habitacion}}</dd>
            @endif
          </div>
          <div class="cr">
            <dt class="dt">Celular</dt>
            <dd class="dd">(+51 {{$cita->celular}})</dd>
          </div>
          <div class="cr">
            <dt class="dt">Dirección</dt>
            <dd class="dd">Av. Javier Prado Este 1066, San Isidro 15036</dd>
          </div>
        </dl>
        @if ( $cita->modalidad == 'virtual')
        <p class="description">
          <b>Iniciar Chat &  VideoLlamada - Whatsapp |</b>
          <a style='margin-left:10px;' href="https://wa.me/51{{ $cita->celular }}?text={{ urlencode('Doctor '.$cita->medico.', ya me encuentro listo para iniciar la video-llamada. 🏥🩺') }}" class="whatsapp" target="_blank">

            <i class="fa fa-whatsapp whatsapp-icon"></i>
          </a>
        </p>
        @elseif( $cita->modalidad == 'presencial')    
        @endif
        
      </div> 
      @elseif($cita->servicio == 'Terapia')   
      <!-- -------------------------------------------------- -->
      <div class="card">
        <div class="header">
          <div>
            <a class="title">
              {{$cita->serv_exacto}}
            </a>
            <p class="name">{{$cita->servicio}} en {{$cita->especialidad}}</p>
          </div>
          <a href="{{ route('terapias.edit', ['id' => $cita->id_paciente, 'id2' => $cita->id_reserva])}}"><div class="imagen_boton3"><i class='bx bxs-donate-heart'></i></div></a>
        </div>
          <p class="description">
            <b>Paciente |</b> {{$cita->paciente}}
          </p>
          <div class="rating">
            <p class="description">
              <b>Medico |</b> {{$cita->medico}}
            </p>
            <input checked="" type="radio" id="star5" name="rate" value="5">
            <label for="star5" title="text"></label>
            <input type="radio" id="star4" name="rate" value="4">
            <label for="star4" title="text"></label>
            <input type="radio" id="star3" name="rate" value="3">
            <label for="star3" title="text"></label>
            <input type="radio" id="star2" name="rate" value="2">
            <label for="star2" title="text"></label>
            <input type="radio" id="star1" name="rate" value="1">
            <label for="star1" title="text"></label>
          </div>
          <!-- -------------------- -->
          <!-- -------------------- -->
        <dl class="post-info">
          <div class="cr">
            <dt class="dt">Fecha</dt>
            <dd class="dd">{{ date( "d/m/y", strtotime($cita->fecha))}} </dd>
          </div>
          <div class="cr">
            <dt class="dt">Hora</dt>
            <dd class="dd">{{ date( "g:i a", strtotime($cita->hora_inicio))}} </dd>
          </div>
          <div class="cr">
            <dt class="dt">Duracion</dt>
            <dd class="dd">30 minutos</dd>
          </div>
          <div class="cr">
            @if ( $cita->modalidad == 'virtual')
            <dt class="dt">Modalidad</dt>
            <dd class="dd">Virtual - <b style='color:green;'>Whatsapp</b> </dd>
            @elseif( $cita->modalidad == 'presencial')     
            <dt class="dt">Consultorio</dt>
            <dd class="dd">{{$cita->cod_habitacion}}</dd>
            @endif
          </div>
          <div class="cr">
            <dt class="dt">Celular</dt>
            <dd class="dd">(+51 {{$cita->celular}})</dd>
          </div>
          <div class="cr">
            <dt class="dt">Dirección</dt>
            <dd class="dd">Av. Javier Prado Este 1066, San Isidro 15036</dd>
          </div>
        </dl>
        @if ( $cita->modalidad == 'virtual')
        <p class="description">
          <b>Iniciar Chat &  VideoLlamada - Whatsapp |</b>
          <a style='margin-left:10px;' href="https://wa.me/51{{ $cita->celular }}?text={{ urlencode('Doctor '.$cita->medico.', ya me encuentro listo para iniciar la video-llamada. 🏥🩺') }}" class="whatsapp" target="_blank">

            <i class="fa fa-whatsapp whatsapp-icon"></i>
          </a>
        </p>
        @elseif( $cita->modalidad == 'presencial')    
        @endif
        
      </div> 
    @endif
    @endforeach

    </div>
@endsection
<style>
  .whatsapp {
  background-color:#25d366;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  font-size:20px;
  padding: 5px 9px;
}


/* ------------------------------------ */

.loader {
  display: flex;
  gap: .5em;
}

.leaf {
  width: 10px;
  height: 30px;
  background-color: rgb(255 0 0 / 30%);
  clip-path: polygon(0% 0%,100% 0%,100% 100%,0% 81%);
  transform: rotate(-30deg);
  animation: color 1200ms infinite;
  animation-delay: 800ms;
}

.leaf:nth-child(2) {
  clip-path: polygon(0% 35%,100% 35%,100% 100%,0% 81%);
  animation-delay: 400ms;
}

.leaf:nth-child(1) {
  clip-path: polygon(0% 70%,100% 70%,100% 100%,0% 81%);
  animation-delay: 0ms;
}

@keyframes color {
  from {
    background-color: #550e0e;
  }

  to {
  }
}




/* ------------------------------------- */


.loader2 {
  display: flex;
  gap: .5em;
}

.leaf2 {
  width: 10px;
  height: 30px;
  background-color: rgb(42 255 0 / 30%);
  clip-path: polygon(0% 0%,100% 0%,100% 100%,0% 81%);
  transform: rotate(-30deg);
  animation: color2 1200ms infinite;
  animation-delay: 800ms;
}

.leaf2:nth-child(2) {
  clip-path: polygon(0% 35%,100% 35%,100% 100%,0% 81%);
  animation-delay: 400ms;
}

.leaf2:nth-child(1) {
  clip-path: polygon(0% 70%,100% 70%,100% 100%,0% 81%);
  animation-delay: 0ms;
}

@keyframes color2 {
  from {
    background-color: #327d3c;
  }

  to {
  }
}

</style>