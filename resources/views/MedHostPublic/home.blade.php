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
  <title>Home | MedHost</title>
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


  <!--FOOTER CSS-->
  <link rel="stylesheet" href="css/footer.css">

  <!--BODY PAGE-->
  <link rel="stylesheet" href="css/index.css">
  
  <!-- Swiper CSS: Carousel Testimonios -->
  <link rel="stylesheet" href="css/swiper-bundle.min.css" />

  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

  <!--Nabvar Flecha PARA ARRIBA-->
  <script src="http://code.jquery.com/jquery-latest.js"></script>

  <script src="Js/cursor.js"></script>

</head>

<body>
  
  

  <section class="CarouselImagenes">
    <div class="slider">
      <div class="slides">
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
        <!--Radio End-->

        <!--Slaide Img Start-->
        <div class="slide first">
          <div class="body">
            <h1>Tu salud es nuestra prioridad</h1>
            <h1>Cuidando tu vida</h1>
            <hr>
            <p class="Definition">La vida de nuestro paciente es nuestra prioridad por eso siempre estaremos a tu
              disposicion</p>
            <a href="">READ MORE</a>
          </div>
          <div class="body-img">
            <img src="Imagenes/fondopersonajes.png" alt="">
          </div>
        </div>

        <div class="slide">
          <div class="body">
            <h1>Aaron el Mas junior</h1>
            <h1>Cuidando tu vida</h1>
            <hr>
            <p class="Definition">Busco Mejorar y Senior como Dave</p>
            <a href="">READ MORE</a>
          </div>
          <div class="body-img">
            <img src="Imagenes/fondopersonajes.png" alt="">
          </div>
        </div>
        <div class="slide">
          <div class="body">
            <h1>Tu salud es nuestra prioridad</h1>
            <h1>Dave el senior</h1>
            <hr>
            <p class="Definition">Agradezo a Anthony ya que gracias a el pude aprender css</p>
            <a href="">READ MORE</a>
          </div>
          <div class="body-img">
            <img src="Imagenes/fondopersonajes.png" alt="">
          </div>
        </div>
        <div class="slide">
          <div class="body">
            <h1>Tu salud es nuestra prioridad</h1>
            <h1>Cuidando tu vida</h1>
            <hr>
            <p class="Definition">La vida de nuestro paciente es nuestra prioridad por eso siempre estaremos a tu
              disposicion</p>
            <a href="">READ MORE</a>
          </div>
          <div class="body-img">
            <img src="Imagenes/fondopersonajes.png" alt="">
          </div>
        </div>
        <!--Slide img End-->

        <!--Automatic Navigation Start-->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
        </div>
        <!--Automatic Navigation End-->


        <!--Manul Navigation Start-->
        <div class="navigation-manual">
          <label for="radio1" class="manual-btn"></label>
          <label for="radio2" class="manual-btn"></label>
          <label for="radio3" class="manual-btn"></label>
          <label for="radio4" class="manual-btn"></label>
        </div>
      </div>
    </div>
  </section>




  <!--WHY CHOOSE US-->
  <section class="ChooseUs">
    <div class="imagenes">
      <img class="father" src="Imagenes/doctor.png" alt="">
      <img class="son" src="https://livedemo00.template-help.com/wt_prod-16367//images/home-1-287x380.png" alt=""
        width="287" height="380px">
    </div>
    <div class="infochosse">
      <h1>Por que debes<br></h1>
      <div class="title">
        <hr>
        <h1>Elegirnos</h1>
      </div>
      <br>
      <p>Nuestros consultorios presentan la más alta calidad y contamos con medicos de prestigio.</p>
      <br>
      <span>Nosotros usamos medicinas de laboratorios de alto prestigio ademas de ello contamos con un convenio de otras empresas como Zoom que nos permiten realizar atenciones de manera remota</span>
      <a class="boton" href="#">LEER MÁS</a>
    </div>
  </section>

  <section class="SectionThree">
    <div class="grid">
      <div class="caja1">
        <div class="caja-lecture" id="first-lecture">
          <div class="icon-container">
            <i class='bx bxs-capsule'></i>
          </div>
          <div class="description">
            <h3>Medicina</h3><br>
            <p>Mantenemos Medicinas con laboratorios de confiable seguridad y procedencia</p>
          </div>
        </div>
        <div class="caja-lecture">
          <div class="icon-container">
            <i class="fa-solid fa-user-doctor" style="color: #000000;"></i></i>
          </div>
          <div class="description">
            <h3>Profesionales</h3><br>
            <p>Contamos con Profesionales de alta calidad con gran experiencia</p>
          </div>
        </div>
        <div class="caja-lecture">
          <div class="icon-container">
            <i class="fa-solid fa-globe" style="color: #000000;"></i>
          </div>
          <div class="description">
            <h3>Servicios</h3><br>
            <p>Contamos con una gran variedad de servicios a su disposición</p>
          </div>
        </div>
        <div class="caja-lecture" id="last-lecture">
          <div class="icon-container">
            <i class="fa-solid fa-microchip"></i>
          </div>
          <div class="description">
            <h3>Tecnologia</h3><br>
            <p>Contamos con altas herramientas tecnologicas que benefician a nuestros pacientes</p>
          </div>
        </div>
      </div>

      <div class="caja2">
        <img src="https://i.pinimg.com/originals/91/c7/7f/91c77f9d95bf34e4ba7f1c471d5b2bd8.jpg" alt="" width="100%"
          height="626px">
      </div>

    </div>
  </section>

  <section class="SectionFour">
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
  </section>

  <!--Testimonios-->

  <section class="testimonios">
    <div class="testimonial mySwiper">
      <div class="testi-content swiper-wrapper">
        <div class="slide swiper-slide">
          <img src="Imagenes/img1.jpg" alt="" class="image" />
          <p>
            ¡MedHost ha cambiado mi experiencia en el cuidado de la salud! Gracias a su plataforma en línea, puedo reservar citas médicas de manera rápida y sencilla, sin tener que esperar largas horas en la sala de espera. Además, su sistema de historial médico digitalizado me permite acceder a mis registros de salud en cualquier momento, lo cual es extremadamente conveniente. ¡Recomiendo MedHost a todos aquellos que buscan una atención médica eficiente y moderna!
          </p>

          <i class="bx bxs-quote-alt-left quote-icon"></i>

          <div class="details">
            <span class="name">Marnie Lotter</span>
            <span class="job">Paciente</span>
          </div>
        </div>
        <div class="slide swiper-slide">
          <img src="Imagenes/img2.jpg" alt="" class="image" />
          <p>
            Como paciente crónico, siempre es un desafío coordinar mis múltiples consultas y tratamientos médicos. Sin embargo, desde que descubrí MedHost, mi vida ha sido mucho más fácil. Su plataforma centralizada me permite programar y administrar todas mis citas médicas de manera organizada. Además, el recordatorio automático de citas y medicamentos me ha ayudado a mantenerme al día con mi tratamiento. ¡MedHost ha sido una bendición para mí y mi salud!
          </p>

          <i class="bx bxs-quote-alt-left quote-icon"></i>

          <div class="details">
            <span class="name">Marnie Lotter</span>
            <span class="job">Paciente</span>
          </div>
        </div>
        <div class="slide swiper-slide">
          <img src="Imagenes/img3.jpg" alt="" class="image" />
          <p>
            MedHost ha transformado la forma en que me comunico con mis médicos. Antes, solía tener dificultades para contactar a mi médico y recibir respuestas a mis preguntas. Sin embargo, con la función de mensajería segura de MedHost, puedo comunicarme directamente con mi equipo médico, hacer preguntas, solicitar recetas y obtener respuestas rápidas y confiables. Estoy agradecida de tener esta herramienta a mi disposición para una mejor atención médica.
          </p>

          <i class="bx bxs-quote-alt-left quote-icon"></i>

          <div class="details">
            <span class="name">Marnie Lotter</span>
            <span class="job">Paciente</span>
          </div>
        </div>

        <div class="slide swiper-slide">
          <img src="Imagenes/img5.jpg" alt="" class="image" />
          <p>
            La experiencia con MedHost ha sido excepcional. Desde el momento en que llego a la clínica, el personal me recibe con una atención amable y eficiente. Además, la plataforma en línea de MedHost me permite acceder a resultados de pruebas médicas de forma rápida y segura, sin tener que esperar días para recibir los resultados. Gracias a MedHost, mi experiencia en el cuidado de la salud ha mejorado significativamente.
          </p>

          <i class="bx bxs-quote-alt-left quote-icon"></i>

          <div class="details">
            <span class="name">Marnie Lotter</span>
            <span class="job">Paciente</span>
          </div>
        </div>
        
        <div class="slide swiper-slide">
          <img src="Imagenes/img6.jpg" alt="" class="image" />
          <p>
            La experiencia con MedHost ha sido excepcional. Desde el momento en que llego a la clínica, el personal me recibe con una atención amable y eficiente. Además, la plataforma en línea de MedHost me permite acceder a resultados de pruebas médicas de forma rápida y segura, sin tener que esperar días para recibir los resultados. Gracias a MedHost, mi experiencia en el cuidado de la salud ha mejorado significativamente.
          </p>

          <i class="bx bxs-quote-alt-left quote-icon"></i>

          <div class="details">
            <span class="name">Marnie Lotter</span>
            <span class="job">Paciente</span>
          </div>
        </div>

        <div class="slide swiper-slide">
          <img src="Imagenes/img7.jpg" alt="" class="image" />
          <p>
            Quiero expresar mi gratitud hacia MedHost por su excepcional servicio y atención al paciente. Desde mi primera visita a su sitio web, quedé impresionada por la claridad de la información y la facilidad de uso de la plataforma. Pude programar una cita con mi médico de manera rápida y sencilla, y cuando llegué a la clínica, fui recibida con una sonrisa cálida y un personal amable. Durante mi consulta, mi médico utilizó la plataforma MedHost para acceder a mi historial médico completo, lo que garantizó una atención personalizada y precisa. Estoy muy agradecida por el enfoque centrado en el paciente de MedHost y por su compromiso de proporcionar una atención médica de calidad. ¡Recomendaré MedHost a mis amigos y familiares sin dudarlo!
          </p>

          <i class="bx bxs-quote-alt-left quote-icon"></i>

          <div class="details">
            <span class="name">Marnie Lotter</span>
            <span class="job">Paciente</span>
          </div>
        </div>
      </div>
      <div class="swiper-button-next nav-btn"></div>
      <div class="swiper-button-prev nav-btn"></div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
</body>
<!-- Swiper JS -->
<script src="js/swiper-bundle.min.js"></script>
<!-- JavaScript -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

</html>
@endsection
@endsection