@extends("layoutsmedhost.footer")

@section("footer")

@extends("layoutsmedhost.header")

@section("header")


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios | MedHost</title>
    <link rel="stylesheet" href="css/servicios.css">
</head>
<body>
<div class='content_tittle'>
    <div>SERVICIOS</div>
    <img width='250px' height='200px' src="https://thumbs.dreamstime.com/b/icono-medicina-y-atenci%C3%B3n-sanitaria-planos-de-la-llamada-emergencia-100940673.jpg" alt=""> 
</div>
<div class='content_ubi'>
    <p>INICIO > SERVICIOS</p> 
</div>

<div class='contenedor_form'>
    <div class='contenedor_form1'>
        <div class='enrolador'>
            <div class='div_form'>¿Por qué los clientes</div>
            <div class='div_content'>
                <div style='width:20%;height:6px;background-color:#8FFFAF;'></div>
                <div class='div_form'>nos eligen?</div>
            </div>
            <p style='margin-top:20px;'><b>Ofrecer una amplia gama de servicios médicos, desde atención primaria hasta especialidades médicas como ginecología, dermatología, pediatría, entre otras.</b> </p>
            <br>
            <br>
            <p>Los clientes eligen nuestra clinica por diferentes motivos,  en primerlugar por la reputación que tenemos en la comunidad, la comodidad y accesibilidad que ofrecemos, la variedad de servicios que brindamos, la calidad de nuestra atención al cliente, el costo nuestros servicios y la tecnología y equipamiento disponible. </p>
            <button class='boton_servicios'></button>
        </div>
        
    </div>
    <div class='contenedor_form2'>
        <img height='650px' width='800px' src="{{ asset('Imagenes/servicios_img.jpeg') }}" alt="">
    </div>
</div>

<div class='contenedor_grid'>
    <div class='contenerdor_grid_2'>
        <div class='tittle_grid'><b>Nuestros Servicios</b> </div><br>
        <div style='height:6px; width:45%;background-color:#8FFFAF;'></div><br>
        <div class='text_flex'>Servicios que brindamosa nuestros pacientes en MedHost</div><br><br><br>
        <div class='grid-tabla'>
            <div class='items-grid grid_1'><img width='100%' height='' src="{{asset('Imagenes/1er_servicio.jpeg')}}" alt="" srcset=""></div>
            <div class='items-grid grid_2'><img width='100%' height='' src="{{asset('Imagenes/2do_servicio.jpeg')}}" alt="" srcset=""></div>
            <div class='items-grid grid_3'><img width='100%' height='' src="{{asset('Imagenes/3er_servicio.jpeg')}}" alt="" srcset=""></div>
            <div class='items-grid grid_4'><img width='100%' height='' src="{{asset('Imagenes/4to_servicio.jpeg')}}" alt="" srcset=""></div>
            <div class='items-grid grid_5'><img width='100%' height='' src="{{asset('Imagenes/5to.jpeg')}}" alt="" srcset=""></div>
            <div class='items-grid grid_6'><img width='100%' height='' src="{{asset('Imagenes/6to.jpeg')}}" alt="" srcset=""></div>
        </div>
    </div>
</div>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>


@endsection


@endsection