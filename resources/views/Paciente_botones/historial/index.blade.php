@extends('layoutssistema.navbar')
@section('linkcss')
<link rel="stylesheet" href="/css/citas_paciente.css">
@endsection
@section('content')
    <div class="citas_pendientes">
    @foreach ($citas_atendidas as $cita)
    @if ( $cita->servicio == 'Cita_Medica')
      <div class="card">
        <div class="header">
          <div>
            <a class="title">
              {{$cita->serv_exacto}}
            </a>
            <p class="name">{{$cita->servicio}} en {{$cita->especialidad}}</p>
          </div>
          <a href="{{ route('ResultadoCitaMedica',$cita->id_reserva)}}"><div class="imagen_boton2"><i class='bx bxs-left-arrow bx-rotate-180' ></i></div></a>
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
      
      @elseif($cita ->servicio == 'Examen')   
      <div class="card">
        <div class="header">
          <div>
            <a class="title">
              {{$cita->serv_exacto}}
            </a>
            <p class="name">{{$cita->servicio}} en {{$cita->especialidad}}</p>
          </div>
          <a href="{{ route('ResultadoExamen',$cita->id_reserva)}}"><div class="imagen_boton2"><i class='bx bxs-left-arrow bx-rotate-180' ></i></div></a>
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
      @elseif($cita ->servicio == 'Terapia')   
      <div class="card">
        <div class="header">
          <div>
            <a class="title">
              {{$cita->serv_exacto}}
            </a>
            <p class="name">{{$cita->servicio}} en {{$cita->especialidad}}</p>
          </div>
          <a href="{{ route('ResultadoTerapia',$cita->id_reserva)}}"><div class="imagen_boton2"><i class='bx bxs-left-arrow bx-rotate-180' ></i></div></a>
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