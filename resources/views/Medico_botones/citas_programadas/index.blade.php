@extends('layoutssistema.navbar')
@section('linkcss')
<link rel="stylesheet" href="/css/citas_paciente.css">
@endsection
@section('content')
  <!-- <div class="cajaanimada"> -->
      <!-- <div class="container-animation"> -->
        <!-- <div class="coffee-header">
          <div class="coffee-header__buttons coffee-header__button-one"></div>
          <div class="coffee-header__buttons coffee-header__button-two"></div>
          <div class="coffee-header__display"></div>
          <div class="coffee-header__details"></div>
        </div> -->
        <!-- <div class="coffee-medium">
          <div class="coffe-medium__exit"></div>
          <div class="coffee-medium__arm"></div>
          <div class="coffee-medium__liquid"></div>
          <div class="coffee-medium__smoke coffee-medium__smoke-one"></div>
          <div class="coffee-medium__smoke coffee-medium__smoke-two"></div>
          <div class="coffee-medium__smoke coffee-medium__smoke-three"></div>
          <div class="coffee-medium__smoke coffee-medium__smoke-for"></div>
          <div class="coffee-medium__cup"></div>
        </div> -->
        <!-- <div class="coffee-footer"></div> -->
    <!-- </div> -->
  <!-- </div> -->
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
            <dd class="dd">Virtual - <b style='color:blue;'>Zoom</b> </dd>
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
          <b>Link - Zoom |</b> {{$cita->paciente}}
        </p>
        @elseif( $cita->modalidad == 'presencial')    
        @endif
        
      </div> 
      
      @elseif($cita->servicio == 'Examen')   
      <!-- <div class="card">
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
        <dl class="post-info">
          <div class="cr">
            <dt class="dt">Fecha</dt>
            <dd class="dd">{{$cita->fecha}}</dd>
          </div>
          <div class="cr">
            <dt class="dt">Hora</dt>
            <dd class="dd">{{$cita->hora_inicio}}</dd>
          </div>
          <div class="cr">
            <dt class="dt">Duracion</dt>
            <dd class="dd">30 minutos</dd>
          </div>
          <div class="cr">
            <dt class="dt">Consultorio</dt>
            <dd class="dd">{{$cita->cod_habitacion}}</dd>
          </div>
        </dl>
      </div>  -->
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
            <dd class="dd">Virtual - <b style='color:blue;'>Zoom</b> </dd>
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
          <b>Link - Zoom |</b> {{$cita->paciente}}
        </p>
        @elseif( $cita->modalidad == 'presencial')    
        @endif
        
      </div> 
      @elseif($cita->servicio == 'Terapia')   
      <!-- <div class="card">
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
        <dl class="post-info">
          <div class="cr">
            <dt class="dt">Fecha</dt>
            <dd class="dd">{{$cita->fecha}}</dd>
          </div>
          <div class="cr">
            <dt class="dt">Hora</dt>
            <dd class="dd">{{$cita->hora_inicio}}</dd>
          </div>
          <div class="cr">
            <dt class="dt">Duracion</dt>
            <dd class="dd">30 minutos</dd>
          </div>
          <div class="cr">
            <dt class="dt">Consultorio</dt>
            <dd class="dd">{{$cita->cod_habitacion}}</dd>
          </div>
        </dl>
      </div>  -->
      <!-- --------------------------------------------- -->
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
            <dd class="dd">Virtual - <b style='color:blue;'>Zoom</b> </dd>
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
          <b>Link - Zoom |</b> {{$cita->paciente}}
        </p>
        @elseif( $cita->modalidad == 'presencial')    
        @endif
        
      </div> 
    @endif
    @endforeach

    </div>
@endsection