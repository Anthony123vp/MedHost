<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title> Medhost | Sistema </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/css/sistema.css">
    <link rel="stylesheet" href="/css/editar.css">
    <link rel="shortcut icon" href="/images/logo.png">

    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    @yield('linkcss')
    <script src="Js/sweetalert2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
<body>
<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image" style='width:auto;'>
                    <img src="/Images/logo.png" alt="">
                </span>

                <div class="text logo-text" style='width:100%;display:flex;justify-content:center;'>
                    <span style='width:100%;display:flex;justify-content:center;letter-spacing:5px;' class="name">MEDHOST</span>
                    <span style='width:100%;display:flex;justify-content:center;letter-spacing:2px;' class="profession">SYSTEM</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{route('Dashboard')}}">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
              @auth
              <!--Medico-->
                @if(Auth::user()->id_rol===4)
                    <li class="nav-link">
                        <a href="{{route('citas_programadas.index')}}">
                            <i class='bx bx-calendar-plus icon' ></i>
                            <span class="text nav-text">Citas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('Horario.index')}}">
                            <i class='bx bx-time icon' ></i>
                            <span class="text nav-text">Horarios</span>
                        </a>
                    </li>
                @endif
                <!--Medico-->
              @endauth

              @auth
              <!--Recepcionista-->
                @if(Auth::user()->id_rol===3)
                    <li class="nav-link">
                        <a href="{{route('reservas.index')}}">
                            <i class='bx bx-calendar-plus icon'></i>
                            <span class="text nav-text">Citas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{route('pacientes.index')}}">
                            <i class='bx bx-user icon' ></i>
                            <span class="text nav-text">Pacientes</span>
                        </a>
                    </li>
              <!--Recepcionista-->
                @endif
              @endauth

              @auth
                  <!--Paciente-->
                @if(Auth::user()->id_rol===1)
                    <li class="nav-link">
                        <a href="{{ route('historial.index') }}">
                            <i class='bx bx-history icon'></i>
                            <span class="text nav-text">Historial Clinico</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('citas_pendiente.index') }}">
                            <i class='bx bx-calendar-plus icon' ></i>
                            <span class="text nav-text">Citas</span>
                        </a>
                    </li>
                <!--End Paciente-->
                @endif
              @endauth
              @auth
                @if(Auth::user()->id_rol===2)
                 <!--Administrador-->
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Medicos</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Recepcionistas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Usuarios</span>
                        </a>
                    </li>
                 <!--End Administrator-->
                @endif
              @endauth
                </ul>
            </div>

            <div class="bottom-content">

            @auth
            <form method="POST" action="{{ route('Logout')}}">
            @csrf
                <li class="">
                    <a>
                        <i class='bx bx-log-out icon' ></i>
                        <button type="Submit"><span class="text nav-text">Logout</span></button>
                    </a>
                </li>
            </form>

          @guest
      <!--SUPERUSUARIO-->
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Administrador</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Usuarios</span>
                        </a>
                    </li>
      <!--END SUPERUSUARIO-->
    @endguest



            @endauth
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">Dashboard Medhost System</div>
        <div class="content">
          @yield('content')
          @yield('navbar_usuarios')
        </div>
    </section>
  
</section>
<script src="/Js/navbar_script.js"></script>
<script src="/Js/sistema.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.js"></script>

<script>



    function generarPDF(event) {
  event.preventDefault();
  const tBody = document.querySelector('#tbody');
  if (tBody.childElementCount === 0) {
    alert("No se puede generar el PDF ya que no hay registros en la tabla.");
    return;
  }

  const doc = new jsPDF();
  const table = document.querySelector('table');

  // Definir las opciones de estilo para la tabla
  const options = {
    styles: {
      fillColor: [0, 176, 80]
    }

  };

  // Generar la tabla usando autoTable con las opciones de estilo
  doc.autoTable({ html: table, ...options });

  doc.save('Reporte.pdf');
}
</script>
@yield('scripts')

</body>
</html>
