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
    <title>Nuestro Equipo | Medhost</title>
    <script src="https://kit.fontawesome.com/3faf17125f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="js/script2.js" defer></script>
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
</style>
    <link rel="stylesheet" href="css/about_our.css">

       <!--!Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />


</head>
<body>

<div class='content_tittle'>
    <div>NUESTRO EQUIPO</div>
    <img width='250px' height='200px' src="https://thumbs.dreamstime.com/b/icono-medicina-y-atenci%C3%B3n-sanitaria-planos-de-la-llamada-emergencia-100940673.jpg" alt=""> 
</div>
<div class='content_ubi'>
    <p id="titulos">INICIO > NUESTRO EQUIPO</p> 
</div>
      <section class="main">
        <div class="main">
          <div class="text">
          <h1>Nuestros Directores Profesionales</h1>
          <div class="raya"></div>
          <p id="titulos">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur ad, adipisci modi facilis soluta veritatis odio eligendi, saepe dolor accusamus vero cum, quas culpa quia consectetur. Beatae obcaecati consectetur sequi.</p>
        </div>
        <div class="contend">

          <div class="ContOne">
            <img src="Imagenes/car1.png" alt="">
            <h2 id="titulos"><b>Mario Rojas</b></h2>
            <p id="titulos">Director Quirofano</p>
          </div>

          <div class="ContTwo">
            <img src="Imagenes/car2.png" alt="">
            <h2 id="titulos"><b>Carlos Darcourt</b></h2>
            <p id="titulos">Director de Productos</p>
          </div>

          <div class="ContTree">
            <img src="Imagenes/car3.png" alt="">
            <h2 id="titulos"><b>Mary Lucas</b></h2>
            <p id="titulos">Founder, Senior Nail Technician</p>
          </div>
        </div>
        </div>
      </section>

      <section class="mainTwo">
        <div class="mainCarrosel">
          <div class="textCarrosel">
          <h1>Nuestros Doctores</h1>
          <div class="raya"></div>
          <p id="titulos">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem labore est quasi in pariatur doloremque quas necessitatibus odit animi culpa, autem repellat assumenda dignissimos nisi laboriosam voluptatum nemo unde amet!</p>
          <h2 id="titulos">Los mejores con experiencia dan confianza!</h2>
          </div>
          <div class="wrapper">
            <i id="left" class="fa-solid fa-angle-left"></i>
            <ul class="carousel">
              <li class="card">
                <img class="bn" src="Imagenes/car1.png" alt="">
                <h2 id="titulos">Blanche Pearson</h2>
                <span>Sales Manager</span>
              </li>
              <li class="card">
                <img class="bn" src="Imagenes/car2.png" alt="">
                <h2 id="titulos">Joenas Brauers</h2>
                <span>Web Developer</span>
              </li>
              <li class="card">
                <img class="bn" src="Imagenes/car3.png" alt="">
                <h2 id="titulos">Lariach French</h2>
                <span>Online Teacher</span>
              </li>
              <li class="card">
                <img class="img5" src="Imagenes/car4.png" alt="">
                <h2 id="titulos">James Khosravi</h2>
                <span>Freelancer</span>
              </li>
              <li class="card">
                <img class="img5" src="Imagenes/car5.png" alt="">
                <h2 id="titulos">Kristina Zasiadko</h2>
                <span>Bank Manager</span>
              </li>
              <li class="card">
                <img class="img5" src="Imagenes/car6.png" alt="">
                <h2 id="titulos">Donald Horton</h2>
                <span>App Designer</span>
              </li>
            </ul>
            <i id="right" class="fa-solid fa-angle-right"></i>
          </div>
        </div>
      </section>


</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</html>

@endsection


@endsection