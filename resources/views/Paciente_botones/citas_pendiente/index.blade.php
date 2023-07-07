@extends('layoutssistema.navbar')
@section('linkcss')
<link rel="stylesheet" href="/css/citas_paciente.css">
@endsection
@section('content')
  <div class="cajaanimada">
      <div class="container-animation">
        <div class="coffee-header">
          <div class="coffee-header__buttons coffee-header__button-one"></div>
          <div class="coffee-header__buttons coffee-header__button-two"></div>
          <div class="coffee-header__display"></div>
          <div class="coffee-header__details"></div>
        </div>
        <div class="coffee-medium">
          <div class="coffe-medium__exit"></div>
          <div class="coffee-medium__arm"></div>
          <div class="coffee-medium__liquid"></div>
          <div class="coffee-medium__smoke coffee-medium__smoke-one"></div>
          <div class="coffee-medium__smoke coffee-medium__smoke-two"></div>
          <div class="coffee-medium__smoke coffee-medium__smoke-three"></div>
          <div class="coffee-medium__smoke coffee-medium__smoke-for"></div>
          <div class="coffee-medium__cup"></div>
        </div>
        <div class="coffee-footer"></div>
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
          <div class="imagen_boton"><i class='bx bxs-time' ></i></div>
        </div>
          <p class="description">
            <b>Paciente |</b> {{$cita->paciente}}
          </p>
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
            <dt class="dt">Consultorio</dt>
            <dd class="dd">{{$cita->cod_habitacion}}</dd>
          </div>
        </dl>
      </div> 
      
      @elseif($cita->servicio == 'Examen')   
      <div class="card">
        <div class="header">
          <div>
            <a class="title">
              {{$cita->serv_exacto}}
            </a>
            <p class="name">{{$cita->servicio}} en {{$cita->especialidad}}</p>
          </div>
          <div class="imagen_boton"><i class='bx bxs-time' ></i></div>

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
      </div> 
      @elseif($cita->servicio == 'Terapia')   
      <div class="card">
        <div class="header">
          <div>
            <a class="title">
              {{$cita->serv_exacto}}
            </a>
            <p class="name">{{$cita->servicio}} en {{$cita->especialidad}}</p>
          </div>
          <div class="imagen_boton"><i class='bx bxs-time' ></i></div>

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
      </div> 
    @endif
    @endforeach

    </div>
@endsection