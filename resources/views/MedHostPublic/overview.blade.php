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
    <title>Nosotros | MedHost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">


    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/3faf17125f.js" crossorigin="anonymous"></script>

  <!--style pae-->
  <link rel="stylesheet" href="css/overview.css">
 <!-- Boxicons CSS -->
 <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
<!--Nabvar Flecha PARA ARRIBA-->
<script src="http://code.jquery.com/jquery-latest.js"></script>

<script src="js/cursor.js"></script>
</head>
<body>
    
<div class='content_tittle'>
    <div>SOBRE NOSOTROS</div>
    <img width='250px' height='200px' src="https://thumbs.dreamstime.com/b/icono-medicina-y-atenci%C3%B3n-sanitaria-planos-de-la-llamada-emergencia-100940673.jpg" alt=""> 
</div>
<div class='content_ubi'>
    <p>INICIO > SOBRE NOSOTROS</p> 
</div>

      <section class="Home">
          <div class="information">
            <div class="body">
              <h1>¿Quienes Somos?</h1>
              <hr>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nostrum aliquam inventore facere vel explicabo tempora nulla deleniti magnam! Veritatis!</p>
              <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem laborum similique aspernatur error dolorum ea animi quo fugit laboriosam non minima distinctio, odio omnis dolorem consectetur quasi vel rerum dolore?</span>
            
            </div>
            
            <div class="horarios">
              <i class="fa-regular fa-clock"></i>
              <div class="first">
                <h5>Opening Hours</h5>
                <p><b>Monday-Friday:</b>8:00am-8:00pm</p>
                <p><b>Saturday:</b>8:00am-8:00pm</p>
                <p><b>Sunday:</b>8:00am-8:00pm</p>
              </div>
              <br>
              <i class="fa-regular fa-clock"></i>
              <div class="second">
                <h5>Opening Hours</h5>
                <p><b>Monday-Friday:</b>8:00am-8:00pm</p>
                <p><b>Saturday:</b>8:00am-8:00pm</p>
                <p><b>Sunday:</b>8:00am-8:00pm</p>
              </div>
            </div>

          </div>
          <div class="imagen"><img src="./Imagenes/doctoresposando.png" alt=""></div>
      </section>




        <div class="Team">
          <div class="four-info">
            <h1>Conozca a nuestros expertos</h1>
            <hr>
            <p>Empleamos a los mejores medicos y especialistas de la industria. Tambien educamos a nuestros propios
              especialistas galardonados a travez de capacitacion constante. Aqui estan los talentos mas destacados de nuestro
              equipo que velaran por tu salud</p>
            <br>
          </div>
          <div class="experts">
            <div class="experts-personality">
              <img src="Imagenes/sandra.jpg" alt="" width="310px" height="280px">
              <div class="info">
                <h2>Ann Nelson</h2>
                <p>Founder,Senior Nail Technician</p>
                <hr width="20px">
                <p>info@demolink.org</p>
              </div>
            </div>
            <div class="experts-personality" id="main-experts">
              <img src="Imagenes/walter.jpg" alt="" width="310px" height="280px">
              <div class="info">
                <h2>Ann Nelson</h2>
                <p>Founder,Senior Nail Technician</p>
                <hr width="20px">
                <p>info@demolink.org</p>
              </div>
            </div>
            <div class="experts-personality">
              <img src="Imagenes/Maria.jpg" alt="" width="310px" height="280px">
              <div class="info">
                <h2>Ann Nelson</h2>
                <p>Founder,Senior Nail Technician</p>
                <hr width="20px">
                <p>info@demolink.org</p>
              </div>
            </div>
          </div>
          <br>
          <a class="boton" href="#">View All Team</a>
        </div>
      </section>


<hr>





    
      
      
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</html>

@endsection

@endsection