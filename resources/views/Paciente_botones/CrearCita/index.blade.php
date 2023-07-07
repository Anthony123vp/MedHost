@extends('layoutssistema.navbar')
@section('linkcss')
    <link rel="stylesheet" href="/css/cardMedico.css">
@endsection
@section('content')
<div class="CajaMedicos">
    <div class="Medicos">
    @foreach ($medicos as  $medico)
        <div class="myCard">
                <div class="innerCard">
                    <div class="frontSide">
                        <div class="medico">
                            <h2>{{ $medico->especialidad->nombre}}</h2>
                            <div class="imagen"><img src="/medicos_imagenes/{{$medico->imagen}}" alt=""></div>
                            <h3>Dr. {{ $medico->nombres,$medico->ape_paterno}}</h3>
                            <div class="btn-especialidad">Doctor</div>
                            <div class="Informacion-Doctor">
                                <p><i class="fa-solid fa-hospital"></i> Años de Experiencia: <b>10</b></p>
                                <p><i class='bx bxl-linkedin-square' ></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="backSide">
                        <div class="medico-informacion">
                            <h2>MedHost</h2>
                            <p style="text-align: justify; font-weight:100;">Lorem, os ut quas! Inventore vitae eveniet officia dolores saepe expedita aperiam ipsum aspernatur tempora veniam. Odio! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam odit minima voluptas, sed fugit unde hic est officiis architecto consectetur consequuntur, quas sequi explicabo, praesentium</p>
                            <a href="{{ route('PacienteCreateCita',$medico->id_medico) }}">Escoger</a>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
    </div>
<div>
@endsection
