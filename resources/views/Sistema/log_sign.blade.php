<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login and Signup</title>
  <link rel="stylesheet" href="css/log_sign.css">
</head>

<body>
  <div class="container">
      <div class="backbox">
        <div class="loginMsg">
          <div class="textcontent">
            <p class="title">¿No tienes una cuenta?</p>
            <p>Registrate e inicia una gran <br> experiencia en Medhost.</p>
            <button class='magic_boton' id="switch1">REGISTRARME</button>
          </div>
        </div>
        <div class="signupMsg visibility">
          <div class="textcontent">
            <p class="title">¿Ya tienes una cuenta?</p>
            <p>Inicia sesión y disfruta de nuestros servicios.</p>
            <button class='magic_boton' id="switch2">INICIAR SESIÓN</button>
          </div>
        </div>
      </div>

    <form method="POST" action="{{route('Login.store')}}">
    @csrf
      <div class="frontbox">
        <div class="login">
            <h2>INICIAR SESIÓN</h2>
            <div  class="inputbox">
                <input type="text" name="email"  placeholder="EMAIL">
                @error('email')
                {{ $message}}
                @enderror
                  <input type="password" name="password" placeholder="PASSWORD">
              </div>
              <p>FORGET PASSWORD?</p>
          <!-- <button type="submit">LOG IN</button> -->
          <button type="submit" class="ui-btn">
            <span>
              LOG IN 
            </span>
          </button>
        </div>
    </form>

      <div class="signup hide">
          <h2>REGISTRO PACIENTE</h2>
          <div class="inputbox">
            <form action="{{ route('pacientes.store')}}" method="POST">
              @csrf
              <div style='width:100%;display:flex;'>
                  <input style='margin-right:5px;padding-left:6px;' type="text" placeholder='NUMERO DOCUMENTO' id="dni" name="dni">
                  <input style='padding-left:6px;' type="text" name='nombres' placeholder='NOMBRE' id="nombres_">

              </div>
              <div style='width:100%;display:flex;'>
              <input style='padding-left:6px;' type="text" placeholder='APELLIDO PATERNO' name='ape_paterno' id="ape_paterno">
              <input style='margin-left:5px;padding-left:6px;' type="text" name='ape_materno' placeholder='APELLIDO MATERNO' id="ape_materno">
              </div>
              <div style='width:100%;display:flex;'>
                  <select style='padding-left:6px;' name="sexo" id="sexo" >
                        <option style='#ccc' value="">  SEXO</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="X">Prefiero no decirlo</option>
                    </select>
                    <input style='margin-left:5px;padding-left:6px;' type="date" placeholder='Dia' autocomplete="off" name='f_nacimiento' id="f_nacimiento">
              </div>
            
              <div style='width:100%;display:flex;'>
                  <input style='padding-left:6px;' type="text" name="email" placeholder="  EMAIL">
                  <input style='margin-left:5px;padding-left:6px;' type="text" placeholder='CELULAR' autocomplete="off" name='celular' id="celular" oninput="formatNumber()" maxlength="13">
              </div>
              <select style='padding-left:6px;'  name="id_insurance" id="id_insurance">
                  <option value="">SEGURO</option>
                  @foreach ($insurances as $insurance)
                      <option value="{{ $insurance->id_insurance }}">{{ $insurance->nombre }}</option>
                  @endforeach
              </select>
              
          <div style="width: 100%;">
            <div class="password-container">
              <input style='padding-left:6px;' type="password" placeholder="CONTRASEÑA" name="password" autocomplete="off" id="password">
              <span class="password-toggle" onmousedown="togglePasswordVisibility('password')" onmouseup="togglePasswordVisibility('password')"></span>
            </div>
            <div class="password-container">
              <input style='padding-left:6px;' type="password" placeholder="REPITE CONTRASEÑA" name="password_2" autocomplete="off" id="password_2">
              <span class="password-toggle" onmousedown="togglePasswordVisibility('password_2')" onmouseup="togglePasswordVisibility('password_2')"></span>
            </div>
          </div>    
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <!-- <button class='boton_registrar_paciente' type="submit">REGISTRARME</button> -->
          <button type="submit" class="ui-btn">
            <span>
              REGISTRARME 
            </span>
          </button>
          <div id="error-message" class="error-message" style="display: none;"></div>
          </form>
            
        </div>
        </div>
    </div>
</div>
</body>

</html>
<script src="Js/log_sign.js"></script>
