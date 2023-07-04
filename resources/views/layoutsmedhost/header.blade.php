<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href='css/header.css'">
    <script src="https://kit.fontawesome.com/3faf17125f.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    

    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
</head>
<body>
    <div class="header-static">
        <div>
          <p><b>Teléfono:</b> +51 989-282-262</p>
        </div>
        <div class="header-static-info">
          <p><b>Horario de Apertura:</b>Lunes - Domingo: 00 am - 24:00 pm</p>
        </div>
        <div class="links-icons">
          <a href=""><i class="fa-brands fa-facebook-f"></i></a>
          <a href=""><i class="fa-brands fa-twitter"></i></a>
          <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
          <a href=""><i class="fa-brands fa-youtube"></i></a>
          <a href=""><i class="fa-brands fa-instagram"></i></a>
        </div>
      </div>
      <header >
        <nav class="navbar navbar-expand-lg bg-body-tertiary header">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><img id="imgMovile" src="{{ asset('Imagenes/LOGO.png') }}" alt="" width="230px" height="45px"></a><!--Logo Version Mobile:Css:display:none-->

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav d-flex justify-content-between" >
                <li class="nav-item">
                  <a class="nav-link active " aria-current="page" href="{{ route('Home_MedHost')}}#">INICIO</a>
                </li>
    
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    NOSOTROS
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('Team_MedHost') }}">Informacion</a></li>
                    <li><a class="dropdown-item" href="{{ route('OurTeam_MedHost' )}}">Nuestro Equipo</a></li>
                  </ul>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="{{ route('Servicios_MedHost' )}}">SERVICIOS</a>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link content_img" aria-current="page" href="{{ route('Home_MedHost')}}"><img id="img-logo" src="{{ asset('Imagenes/LOGO.png') }}" alt="" width="230px" height="45px"></a>
                </li>
    
                
    
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="{{ route('Especialidades_MedHost')}}">ESPECIALIDADES</a>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="{{ route('Contact_MedHost')}}">CONTACTO</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-user fa-xl" style="color: #000000;"></i>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('login' ) }}">Registrarse</a></li>
                    <li><a class="dropdown-item" href="{{ route('login' ) }}">Iniciar Sesion</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div>
              <div class="header-static2" id="myDiv" style="display: none;">
                <div>
                  <p><b>Teléfono:</b> +51 989-282-262</p>
                </div>
                <div class="header-static-info2">
                  <p><b>Horario de Apertura: </b>Lunes - Domingo: 00 am - 24:00 pm</p>
                </div>
                <div class="links-icons">
                  <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                  <a href=""><i class="fa-brands fa-twitter"></i></a>
                  <a href=""><i class="fa-brands fa-google-plus-g"></i></a>
                  <a href=""><i class="fa-brands fa-youtube"></i></a>
                  <a href=""><i class="fa-brands fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </header>
@yield('header')
</body>

</html>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const myDiv = document.getElementById("myDiv");
    const navbarToggler = document.querySelector(".navbar-toggler");

    navbarToggler.addEventListener("click", function() {
      if (myDiv.style.display === "none") {
        myDiv.style.display = "flex";
      } else {
        myDiv.style.display = "none";
      }
    });
  });
</script>