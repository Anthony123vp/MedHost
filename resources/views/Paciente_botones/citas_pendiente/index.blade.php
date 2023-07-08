@extends('layoutssistema.navbar')
@section('linkcss')
<link rel="stylesheet" href="/css/citas_paciente.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">@endsection
@section('content')
    <div style='width: 80%;'>
      <div style='align-self:flex-start;width:90%;border:2px solid red;border-radius:5px;color:red;background:#f2747447;height:40px;display:flex;align-items:center;padding-left:5px;'>
          ¡¡ Recuerda pagar a tiempo tus Citas o tendrás que volver a reservar una !!
        </div>
    </div>
    
    <div class="citas_pendientes">
    @foreach ($citas as $cita)
    @if ( $cita->servicio == 'Cita_Medica')
          <div class="card">
            <div class="header">
              <div>
                <a class="title">
                  {{$cita->serv_exacto}}
                </a>
                <p class="name">{{$cita->servicio}} en {{$cita->especialidad}}</p>
              </div>
              <!-- <button class='activar_b' onclick="window.location.href='{{ route('pagos_pendiente.edit', ['id' => $cita->id_reserva]) }}'"> Pago pendiente</button> -->
              @if ($cita->pago_estado == 1) 
              <button onclick="window.location.href='{{ route('pagos_pendiente.edit', ['id' => $cita->id_reserva]) }}'" class="noselect mi_boton_pagar"><span class="text">Cancelar Pago</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span></button>
              @elseif  ($cita->pago_estado == 0) 
              <button class="btn_realizado">
                Pago Realizado
              </button>
              @endif

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
                  @if ($cita->pago_estado == 1) 
                  @elseif  ($cita->pago_estado == 0) 
                    <dt class="dt">Consultorio</dt>
                    <dd class="dd">{{$cita->cod_habitacion}}</dd>
                  @endif
                @endif
              </div>
              @if ($cita->pago_estado == 1) 
              @elseif ($cita->pago_estado == 0) 
              <div class="cr">
                <dt class="dt">Celular</dt>
                <dd class="dd">(+51 {{$cita->celular}})</dd>
              </div>
              @endif
              <div class="cr">
                <dt class="dt">Dirección</dt>
                <dd class="dd">Av. Javier Prado Este 1066, San Isidro 15036</dd>
              </div>
            </dl>
            @if ($cita->pago_estado == 1) 
            @elseif  ($cita->pago_estado == 0) 
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
              <!-- <button class='activar_b' onclick="window.location.href='{{ route('pagos_pendiente.edit', ['id' => $cita->id_reserva]) }}'"> Pago pendiente</button> -->
              @if ($cita->pago_estado == 1) 
              <button onclick="window.location.href='{{ route('pagos_pendiente.edit', ['id' => $cita->id_reserva]) }}'" class="noselect mi_boton_pagar"><span class="text">Cancelar Pago</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span></button>
              @elseif  ($cita->pago_estado == 0) 
              <button class="btn_realizado">
                Pago Realizado
              </button>
              @endif

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
                  @if ($cita->pago_estado == 1) 
                  @elseif  ($cita->pago_estado == 0) 
                    <dt class="dt">Consultorio</dt>
                    <dd class="dd">{{$cita->cod_habitacion}}</dd>
                  @endif
                @endif
              </div>
              @if ($cita->pago_estado == 1) 
              @elseif ($cita->pago_estado == 0) 
              <div class="cr">
                <dt class="dt">Celular</dt>
                <dd class="dd">(+51 {{$cita->celular}})</dd>
              </div>
              @endif
              <div class="cr">
                <dt class="dt">Dirección</dt>
                <dd class="dd">Av. Javier Prado Este 1066, San Isidro 15036</dd>
              </div>
            </dl>
            @if ($cita->pago_estado == 1) 
            @elseif  ($cita->pago_estado == 0) 
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

      @elseif($cita->servicio == 'Terapia')   
      <!-- -------------------------------------------------- -->
       <!-- ------------------------------------------- -->
       <div class="card">
            <div class="header">
              <div>
                <a class="title">
                  {{$cita->serv_exacto}}
                </a>
                <p class="name">{{$cita->servicio}} en {{$cita->especialidad}}</p>
              </div>
              <!-- <button class='activar_b' onclick="window.location.href='{{ route('pagos_pendiente.edit', ['id' => $cita->id_reserva]) }}'"> Pago pendiente</button> -->
              @if ($cita->pago_estado == 1) 
              <button onclick="window.location.href='{{ route('pagos_pendiente.edit', ['id' => $cita->id_reserva]) }}'" class="noselect mi_boton_pagar"><span class="text">Cancelar Pago</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span></button>
              @elseif  ($cita->pago_estado == 0) 
              <button class="btn_realizado">
                Pago Realizado
              </button>
              @endif

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
                  @if ($cita->pago_estado == 1) 
                  @elseif  ($cita->pago_estado == 0) 
                    <dt class="dt">Consultorio</dt>
                    <dd class="dd">{{$cita->cod_habitacion}}</dd>
                  @endif
                @endif
              </div>
              @if ($cita->pago_estado == 1) 
              @elseif ($cita->pago_estado == 0) 
              <div class="cr">
                <dt class="dt">Celular</dt>
                <dd class="dd">(+51 {{$cita->celular}})</dd>
              </div>
              @endif
              <div class="cr">
                <dt class="dt">Dirección</dt>
                <dd class="dd">Av. Javier Prado Este 1066, San Isidro 15036</dd>
              </div>
            </dl>
            @if ($cita->pago_estado == 1) 
            @elseif  ($cita->pago_estado == 0) 
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


.mi_boton_pagar {
 width: 250px;
 height: 40px;
 cursor: pointer;
 display: flex;
 align-items: center;
 justify-content:center;
 background: red ;
 color:#fff;
 border: none;
 border-radius: 5px;
 box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
 background: #e62222;
}

.mi_boton_pagar, .mi_boton_pagar span {
 transition: 200ms;
}

.mi_boton_pagar .text {
 /* transform: translateX(35px); */
 color: #fff !important;
 font-weight: bold;
 font-size:15px !important;
}

.mi_boton_pagar .icon {
 position: absolute;
 border-left: 1px solid #c41b1b;
 transform: translateX(110px);
 height: 40px;
 width: 40px;
 display: flex;
 align-items: center;
 justify-content: center;
}

.mi_boton_pagar svg {
 width: 15px;
 fill: #eee;
}

.mi_boton_pagar:hover {
 background: #ff3636 ;
}

.mi_boton_pagar:hover .text {
 color: transparent !important;
}

.mi_boton_pagar:hover .icon {
 width: 150px;
 border-left: none;
 transform: translateX(0);
}

.mi_boton_pagar:focus {
 outline: none;
}

.mi_boton_pagar:active .icon svg {
 transform: scale(0.8);
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




.btn_realizado {
 background-color: #00BFA6;
 padding: 14px 40px;
 width:auto;
 color: #fff;
 text-transform: uppercase;
 letter-spacing: 2px;
 cursor: pointer;
 border-radius: 10px;
 border: 2px dashed #00BFA6;
 box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
 transition: .4s;
}

.btn_realizado span:last-child {
 display: none;
}

.btn_realizado:hover {
 transition: .4s;
 border: 2px dashed #00BFA6;
 background-color: #fff;
 color: #00BFA6;
}

.btn_realizado:active {
 background-color: #87dbd0;
}


</style>