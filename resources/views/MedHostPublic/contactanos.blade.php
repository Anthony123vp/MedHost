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
    <title>Contacto | MedHost</title>
    <link rel="stylesheet" href="css/contactanos.css">
</head>
<body>
<div class='content_tittle'>
    <div>CONTACTANOS</div>
    <img width='250px' height='200px' src="https://thumbs.dreamstime.com/b/icono-medicina-y-atenci%C3%B3n-sanitaria-planos-de-la-llamada-emergencia-100940673.jpg" alt=""> 
</div>
<div class='content_ubi'>
    <p>INICIO > CONTACTANOS</p> 
</div>

<div class='contenedor_form'>
    <div class='contenedor_form1'>
        <h1 class='h1_form'>Contactanos</h1>
        <p>Tu puedes contactarnos de la manera que creas conveniente. Nosotros estamos disponicles 24/7 via fax o por email. <br>
            Tu tambien puedes rellenar el formulario de abajo y podras ser contactado por nuestro personal de soporte.</p>
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Primer Nombre</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Apellido</label>
                    <input type="password" class="form-control" id="inputPassword4">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Telefono</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Email</label>
                    <input type="password" class="form-control" id="inputPassword4">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Comentarios</span>
                    <textarea class="form-control" aria-label="With textarea"></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
    </div>
    <div class='contenedor_form2'>
        <div class="card w-50">
            <div class="card-body">
                <h5 class="card-title">Dirección</h5>
                <div style='display:flex;'>
                    <img width='70px' height='40px' src="{{ asset('Imagenes/logo_maps.png')}}" alt="">
                    <p class="card-text"> Mal. de la Reserva 610, Miraflores 15074</p>
                </div>
            </div>
        </div>
        <br>

        <div class='hr' style='width:314px;background-color:#ccc;height:3px;'></div>

        <br>
        
        <div class="card w-50">
            <div class="card-body">
                <h5 class="card-title">Telefonos</h5>
                <div style='display:flex;'>
                    <img style='margin-left:20px;' width='40px' height='40px' src="{{ asset('Imagenes/telefono_logo.png')}}" alt="">
                    <p style='margin-left:20px;' class="card-text">  989 - 282 - 262 <br> 989 - 282 - 263</p>
                </div>
            </div>
        </div>
        <br>

        <div class='hr' style='width:314px;background-color:#ccc;height:3px;'></div>

        <br>

        <div class="card w-50">
            <div class="card-body">
                <h5 class="card-title">E-mail</h5>
                <div style='display:flex;'>
                    <img style='margin-left:10px;' width='70px' height='40px' src="{{ asset('Imagenes/email.png')}}" alt="">
                    <p style='margin-left:20px;' class="card-text email_"> anthony.vilcatoma@gmail.com</p>
                </div>
            </div>
        </div>

        <br>

        <div class='hr' style='width:314px;background-color:#ccc;height:3px;'></div>

        <br>

        <div class="card w-50">
            <div class="card-body">
                <h5 class="card-title">Horario Atención</h5>
                <div style='display:flex;'>
                    <img style='margin-left:10px;' width='50px' height='40px' src="{{ asset('Imagenes/reloj.png')}}" alt="">
                    <p style='margin-left:20px;' class="card-text">Lunes - Domingo <br> 00 am - 24:00 pm</p>
                </div>
            </div>
        </div>

    </div>
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.7104006419536!2d-77.0305119!3d-12.1319564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105b7e1b4ac9a5f%3A0x8c128c9d6de55eb3!2sLarcomar%2C%20Mal.%20de%20la%20Reserva%20610%2C%20Miraflores%2015074!5e0!3m2!1ses!2spe!4v1684766038705!5m2!1ses!2spe" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>


@endsection

@endsection