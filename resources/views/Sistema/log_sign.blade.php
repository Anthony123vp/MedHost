<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login and Signup</title>
  <link rel="shortcut icon" href="/images/logo.png">
  <link rel="stylesheet" href="css/log_sign.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                <input style='padding-left:6px;' type="text" name="email" value="{{ old('email')}}"  placeholder="EMAIL">
                @error('email')
                <div class="error-message">{{ $message }}</div>
                @enderror
                <div class="password-container">
                  <input style='padding-left:6px;' type="password" name="password" placeholder="PASSWORD" value="{{ old('password')}}" id="password">
                  @error('password')
                  <div class="error-message">{{ $message }}</div>
                  @enderror
                </div>
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
            <form action="{{ route('pacientes.store')}}" class='needs-validation' novalidate method="POST">
              @csrf
              <div style='width:100%;display:flex;justify-content:space-between;margin-bottom:20px;'>
                <div style='width:49.5%;height:auto;display:flex;flex-direction:column;'>
                  <input style='margin-right:5px;padding-left:6px;margin-bottom: -5px;' class='dni' required maxlength="8" minlength="8" value="{{ old('dni') }}"  type="text" placeholder='NUMERO DOCUMENTO' id="validationCustom01" name="dni" oninput="capitalizeFirstLetter(this)">
                  <div style='text-align:left;display:none;' class='error-message incorrect_dni2'>
                  </div>
                  <div style='text-align:left;display:none;' class='valid-message correct_dni2'>
                  </div>
                  <!-- <div class="valid-feedback" style='text-align:left;'>
                    El DNI ingresado es correcto! 
                  </div>
                  <div class="invalid-feedback" style='text-align:left;'>
                    Por favor ingresa el campo DNI.
                  </div> -->
                </div>
                <div style='width:49.5%;'>
                  <input style='padding-left:6px;margin-bottom: -5px;' class='nombres' required value="{{ old('nombres') }}"  type="text" name='nombres' placeholder='NOMBRE' id="validationCustom02" oninput="capitalizeFirstLetter(this)">
                  <div style='text-align:left;display:none;' class='error-message incorrect_nombres2'>
                  </div>
                  <div style='text-align:left;display:none;' class='valid-message correct_nombres2'>
                  </div>
                  <!-- <div class="valid-feedback" style='text-align:left;'>
                    El Nombre ingresado es correcto!
                  </div>
                  <div class="invalid-feedback" style='text-align:left;'>
                    Por favor ingresa el campo nombre.
                  </div> -->
                </div>
              </div>
              <!-- ---------------- -->
              <div style='width:100%;display:flex;justify-content:space-between;margin-bottom:20px;'>
                <div style='width:49.5%;height:auto;display:flex;flex-direction:column;align-items:start;'>
                  <input style='padding-left:6px;margin-bottom: -5px;' type="text" class='ape_paterno' value="{{ old('ape_paterno') }}" required placeholder='APELLIDO PATERNO' name='ape_paterno' id="validationCustom03" oninput="capitalizeFirstLetter(this)">
                  
                  <div style='text-align:left;display:none;' class='error-message incorrect_ape_paterno2'>
                  </div>
                  <div style='text-align:left;display:none;' class='valid-message correct_ape_paterno2'>
                  </div>
                  <!-- <div class="valid-feedback" style='text-align:left;'>
                    El Apellido P. ingresado es correcto!
                  </div>
                  <div class="invalid-feedback" style='text-align:left;'>
                    Por favor ingresa el campo Apellido P.
                  </div> -->
                </div>
                <div style='width:49.5%;'>
                  <input style='padding-left:6px;margin-bottom: -5px;' class='ape_materno' type="text" value="{{ old('ape_materno') }}" required placeholder='APELLIDO MATERNO' name='ape_materno' id="validationCustom04" oninput="capitalizeFirstLetter(this)">
                  
                  <div style='text-align:left;display:none;' class='error-message incorrect_ape_materno2'>
                  </div>
                  <div style='text-align:left;display:none;' class='valid-message correct_ape_materno2'>
                  </div>
                  <!-- <div class="valid-feedback" style='text-align:left;'>
                    El Apellido M. ingresado es correcto!
                  </div>
                  <div class="invalid-feedback" style='text-align:left;'>
                    Por favor ingresa el campo Apellido M.
                  </div> -->
                </div>
              </div>
              <!-- ----------------- -->
              <div style='width:100%;display:flex;justify-content:space-between;margin-bottom:20px;'>
                <div style='width:49.5%;height:auto;display:flex;flex-direction:column;'>
                    <select style='padding-left:6px;font-size:13px;background-color:#f2f2f2;' class='sexo' value="{{ old('sexo') }}" name="sexo" class="form-select" id="validationCustom05" required>
                      <option style='background-color:#f2f2f2;' selected  value="">SEXO</option>
                      <option value="M">Masculino</option>
                      <option value="F">Femenino</option>
                      <option value="X">Prefiero no decirlo</option>
                    </select>

                    <div style='text-align:left;display:none;' class='error-message incorrect_sexo2'>
                  </div>
                  <div style='text-align:left;display:none;' class='valid-message correct_sexo2'>
                  </div>
                    <!-- <div class="invalid-feedback" style='text-align:left;'>
                      Por favor selecciona campo Sexo.
                    </div>
                    <div class="valid-feedback" style='text-align:left;'>
                    El Sexo elegido es correcto!
                    </div> -->
                </div>
                <div style='width:49.5%;'>
                  <input style='padding-left:6px;margin-bottom: -5px;' class='f_nacimiento' type="date" required value="{{ old('f_nacimiento') }}"  placeholder='Dia' name='f_nacimiento' id="validationCustom06">
                  
                  <div style='text-align:left;display:none;' class='error-message incorrect_f_nacimiento2'>
                  </div>
                  <div style='text-align:left;display:none;' class='valid-message correct_f_nacimiento2'>
                  </div>
                  <!-- <div class="valid-feedback" style='text-align:left;'>
                    La Fecha de nac. ingresada es correcto!
                  </div>
                  <div class="invalid-feedback" style='text-align:left;'>
                    Por favor ingresa el campo Fecha nac.
                  </div> -->
                </div>
              </div>

              <!-- ---------------- -->
              <div style='width:100%;display:flex;justify-content:space-between;margin-bottom:20px;'>
                <div style='width:49.5%;height:auto;display:flex;flex-direction:column;align-items:start;'>
                  <input style='padding-left:6px;margin-bottom: -5px;' class='email' type="email" required value="{{ old('email') }}"  placeholder='  EMAIL' name='email' id="validationCustom07">
                  
                  <div style='text-align:left;display:none;' class='error-message incorrect_email2'>
                  </div>
                  <div style='text-align:left;display:none;' class='valid-message correct_email2'>
                  </div>
                  <!-- <div class="valid-feedback" style='text-align:left;'>
                    El Email ingresado es correcto!
                  </div>
                  <div class="invalid-feedback" style='text-align:left;'>
                    Por favor ingresa el campo Email.
                  </div> -->
                </div>
                <div style='width:49.5%;'>
                  <input style='padding-left:6px;margin-bottom: -5px;' type="text" class="celular" required value="{{ old('celular') }}"  maxlength="11" minlength="11" placeholder='CELULAR' name='celular' id="validationCustom08" oninput="formatPhoneNumber_(this)">
                  
                  <div style='text-align:left;display:none;' class='error-message incorrect_celular2'>
                  </div>
                  <div style='text-align:left;display:none;' class='valid-message correct_celular2'>
                  </div>
                  <!-- <div class="valid-feedback" style='text-align:left;'>
                    El Celular ingresado es correcto!
                  </div>
                  <div class="invalid-feedback" style='text-align:left;'>
                    Por favor ingresa el campo Celular.
                  </div> -->
                </div>
              </div>
              <!-- ----------------- -->
              <div style='width:100%;display:flex;justify-content:space-between;margin-bottom:20px;'>
                <div style='width:100%;height:auto;display:flex;flex-direction:column;'>
                  <select style='padding-left:6px;font-size:13px;background-color:#f2f2f2;' value="{{ old('id_insurance') }}"  name="id_insurance" class="form-select seguro_elegido" id="validationCustom09" required>
                      <option style='background-color:#f2f2f2;' selected  value="">SEGURO</option>
                      @foreach ($insurances as $insurance)
                          <option value="{{ $insurance->id_insurance }}">{{ $insurance->nombre }}</option>
                      @endforeach
                  </select>
                  <div style='text-align:left;display:none;' class='error-message incorrect_seguro2'>
                  </div>
                  <div style='text-align:left;display:none;' class='valid-message correct_seguro2'>
                  </div>
                  <!-- <div class="invalid-feedback" style='text-align:left;'>
                    Por favor selecciona campo Seguro.
                  </div>
                  <div class="valid-feedback" style='text-align:left;'>
                    El Seguro elegido es correcto!
                  </div> -->
                </div>
              </div>
              
          <!-- <div style="width: 100%;">
            <div class="password-container">
              </div>
              <div class="password-container">
                
              </div>
            </div>  -->
            <!-- ---------------- -->
            <div style='width:100%;display:flex;justify-content:space-between;margin-bottom:20px;'>
              <div style='width:49.5%;height:auto;display:flex;flex-direction:column;align-items:flex-start;'>
                <!-- <input style='padding-left:6px;margin-bottom: -5px;' type="text" required placeholder='  EMAIL' name='email' id="validationCustom07"> -->
                <input style='padding-left:6px;margin-bottom: -5px;' class="password" type="password" required value="{{ old('password') }}" placeholder="CONTRASEÑA" name="password"  id="password">
 
                <div style='text-align:left;' class='valid-message correct_password1'>
                </div>
                <!-- <span class="password-toggle" onmousedown="togglePasswordVisibility('password')" onmouseup="togglePasswordVisibility('password')"></span> -->
                  <!-- <div class="valid-feedback" style='text-align:left;'>
                    La contraseña ingresada es correcta!
                  </div>
                  <div class="invalid-feedback" style='text-align:left;'>
                    Por favor ingresa el campo contraseña.
                  </div> -->
                </div>
                <div style='width:49.5%;'>
                  <!-- <input style='padding-left:6px;margin-bottom: -5px;' type="text" required placeholder='CELULAR' name='celular' id="validationCustom08"  maxlength="11" oninput="formatPhoneNumber_(this)"> -->
                  <input style='padding-left:6px;margin-bottom: -5px;' class='password_2' type="password" required value="{{ old('password_2') }}" placeholder="REPITE CONTRASEÑA" name="password_2"  id="password_2">
                  <!-- <span class="password-toggle" onmousedown="togglePasswordVisibility('password_2')" onmouseup="togglePasswordVisibility('password_2')"></span> -->
                  <div style='text-align:left;' class='error-message incorrect_password2'>
                  </div>
                  <div style='text-align:left;' class='valid-message correct_password2'>
                  </div>
                </div>
              </div>
              <!-- ----------------- -->
          <button type="submit" class="ui-btn">
            <span>
              REGISTRARME 
            </span>
          </button>
          </form>
            
        </div>
        </div>
    </div>
</div>
</body>

</html>
<script src="Js/log_sign.js"></script>
<script>
  
  function validate_input2(input) {
    capitalizeFirstLetter(input);
    // validate2Length(input);
  }

  function validate_input2(input) {
    // var value = input.value;
    // input.value = value.charAt(0).toUpperCase() + value.slice(1);
    // var names = value.split(" ");
    // console.log(names[0].length);
    // console.log(names[1].length);
    // if (names.length < 2 || (  names[0].length <= 2 && names[1].length <= 2)) {
    //   input.setCustomValidity("El campo debe contener al menos dos caracteres.");
    //   input.nextElementSibling.style.display = "none";
    //   input.nextElementSibling.classList.add("invalid-feedback");
    // } else {
    //   input.setCustomValidity(""); 
    //   input.nextElementSibling.style.display = "block";
    //   input.nextElementSibling.classList.remove("invalid-feedback");
    // }
  }

  function capitalizeFirstLetter(input) {
      var value = input.value;
      input.value = value.charAt(0).toUpperCase() + value.slice(1);
  }

  function formatPhoneNumber_(input) {
    var value = input.value.replace(/\D/g, ''); // Eliminar todos los caracteres que no sean dígitos
    var formattedValue = '';
    for (var i = 0; i < value.length; i++) {
      if (i > 0 && i % 3 === 0) {
        formattedValue += '-';
      }
      formattedValue += value.charAt(i);
    }
    input.value = formattedValue;
  }


  (() => {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation')

    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()

  var passwordInput = document.querySelector('.password');
  var password2Input = document.querySelector('.password_2');

  var incorrectPassword2 = document.querySelector('.incorrect_password2');
  var correctPassword2 = document.querySelector('.correct_password2');
  var correctPassword1 = document.querySelector('.correct_password1');
  
  var seguroElegido = document.querySelector('.seguro_elegido');
  var incorrect_seguro2 = document.querySelector('.incorrect_seguro2');
  var correct_seguro2 = document.querySelector('.correct_seguro2');
  
  var celular = document.querySelector('.celular');
  var incorrect_celular2 = document.querySelector('.incorrect_celular2');
  var correct_celular2 = document.querySelector('.correct_celular2');
 
  var email = document.querySelector('.email');
  var incorrect_email2 = document.querySelector('.incorrect_email2');
  var correct_email2 = document.querySelector('.correct_email2');
  
  var ape_paterno = document.querySelector('.ape_paterno');
  var incorrect_ape_paterno2 = document.querySelector('.incorrect_ape_paterno2');
  var correct_ape_paterno2 = document.querySelector('.correct_ape_paterno2');

  var ape_materno = document.querySelector('.ape_materno');
  var incorrect_ape_materno2 = document.querySelector('.incorrect_ape_materno2');
  var correct_ape_materno2 = document.querySelector('.correct_ape_materno2');

  var dni = document.querySelector('.dni');
  var incorrect_dni2 = document.querySelector('.incorrect_dni2');
  var correct_dni2 = document.querySelector('.correct_dni2');

  var nombres = document.querySelector('.nombres');
  var incorrect_nombres2 = document.querySelector('.incorrect_nombres2');
  var correct_nombres2 = document.querySelector('.correct_nombres2');

  var f_nacimiento = document.querySelector('.f_nacimiento');
  var incorrect_f_nacimiento2 = document.querySelector('.incorrect_f_nacimiento2');
  var correct_f_nacimiento2 = document.querySelector('.correct_f_nacimiento2');

  var sexo = document.querySelector('.sexo');
  var incorrect_sexo2 = document.querySelector('.incorrect_sexo2');
  var correct_sexo2 = document.querySelector('.correct_sexo2');

  seguroElegido.addEventListener('change', validateSeguroElegido);

  sexo.addEventListener('change', validateSexo);

  password2Input.addEventListener('keyup', validatePasswords);

  celular.addEventListener('keyup', validateCelular);

  email.addEventListener('keyup', validateemail);

  ape_paterno.addEventListener('keyup', validateape_paterno);

  ape_materno.addEventListener('keyup', validateape_materno);

  nombres.addEventListener('keyup', validatenombres);
  
  dni.addEventListener('keyup', validatedni);
  
  f_nacimiento.addEventListener('change', validateDateOfBirth);
  
  function validateSeguroElegido() {
    var selectedOption = seguroElegido.value;
    if (selectedOption == '') {
      incorrect_seguro2.style.display = 'block';
      incorrect_seguro2.textContent = 'No se ah elegido Seguro';
      correct_seguro2.style.display = 'none';
      } else {
        correct_seguro2.style.display = 'block';
        correct_seguro2.textContent = 'EL Seguro ah sido elegido';
        incorrect_seguro2.style.display = 'none';
    }
}

function validateSexo() {
    var sexoOption = sexo.value;
    if (sexoOption == '') {
      incorrect_sexo2.style.display = 'block';
      incorrect_sexo2.textContent = 'No se ah elegido Sexo';
      correct_sexo2.style.display = 'none';
      } else {
        correct_sexo2.style.display = 'block';
        correct_sexo2.textContent = 'EL Sexo ah sido elegido';
        incorrect_sexo2.style.display = 'none';
    }
}


function validateDateOfBirth() {
    var dateOfBirthInput = f_nacimiento.value;
    var datePattern = /^\d{4}-\d{2}-\d{2}$/;
        console.log(dateOfBirthInput);
    
    if (dateOfBirthInput == "") {
        incorrect_f_nacimiento2.style.display = 'block';
        incorrect_f_nacimiento2.textContent = 'La fecha nac. no es válida';
        correct_f_nacimiento2.style.display = 'none';
    } else if (!datePattern.test(dateOfBirthInput)) {
        incorrect_f_nacimiento2.style.display = 'block';
        incorrect_f_nacimiento2.textContent = 'La fecha no tiene el formato correcto';
        correct_f_nacimiento2.style.display = 'none';
    } else {
        correct_f_nacimiento2.style.display = 'block';
        correct_f_nacimiento2.textContent = "La fecha nac. es válida!";
        incorrect_f_nacimiento2.style.display = 'none';
    }
}

  function validateemail() {
    var emailInput = email.value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (emailInput == "") {
        incorrect_email2.style.display = 'block';
        incorrect_email2.textContent = 'El email no es válido';
        correct_email2.style.display = 'none';
    } else if (!emailPattern.test(emailInput)) {
        incorrect_email2.style.display = 'block';
        incorrect_email2.textContent = 'El formato no es correcto';
        correct_email2.style.display = 'none';
    } else {
        correct_email2.style.display = 'block';
        correct_email2.textContent = "El email ingresado es correcto!";
        incorrect_email2.style.display = 'none';
    }
}
  
function validateape_paterno() {
  var ape_paternoInput = ape_paterno.value;

  if (ape_paternoInput.length < 3) {
      incorrect_ape_paterno2.style.display = 'block';
      incorrect_ape_paterno2.textContent = 'El Ape. M. no es válido';
      correct_ape_paterno2.style.display = 'none';
  } else {
      correct_ape_paterno2.style.display = 'block';
      correct_ape_paterno2.textContent = "El  Ape. M. ingresado es correcto!";
      incorrect_ape_paterno2.style.display = 'none';
  }
}

function validatedni() {
  var dniInput = dni.value;

  if (dniInput.length < 9 && dniInput.length > 7) {
    correct_dni2.style.display = 'block';
    correct_dni2.textContent = "El  DNI ingresado es correcto!";
    incorrect_dni2.style.display = 'none';
  } else {
    incorrect_dni2.style.display = 'block';
    incorrect_dni2.textContent = 'El DNI no es válido';
    correct_dni2.style.display = 'none';
  }
}

function validatenombres() {
  var nombresInput = nombres.value;

  if (nombresInput.length < 3) {
      incorrect_nombres2.style.display = 'block';
      incorrect_nombres2.textContent = 'El Nombre no es válido';
      correct_nombres2.style.display = 'none';
  } else {
      correct_nombres2.style.display = 'block';
      correct_nombres2.textContent = "El  Nombre ingresado es correcto!";
      incorrect_nombres2.style.display = 'none';
  }
}

function validateape_materno() {
    var ape_maternoInput = ape_materno.value;

    if (ape_maternoInput.length < 3) {
        incorrect_ape_materno2.style.display = 'block';
        incorrect_ape_materno2.textContent = 'El Ape. M. no es válido';
        correct_ape_materno2.style.display = 'none';
    } else {
        correct_ape_materno2.style.display = 'block';
        correct_ape_materno2.textContent = "El  Ape. M. ingresado es correcto!";
        incorrect_ape_materno2.style.display = 'none';
    }
}

  
  function validateCelular() {
      var celularInput = celular.value;
      console.log(celularInput);
      if (celularInput.length < 11) {
        incorrect_celular2.style.display = 'block';
        incorrect_celular2.textContent = 'El celular debe tener 9 digitos';
        correct_celular2.style.display = 'none';
      } else {
        correct_celular2.style.display = 'block';
        correct_celular2.textContent = 'El celular tiene 9 digitos';
        incorrect_celular2.style.display = 'none';
      }
  }
  
  function validatePasswords() {
      var password = passwordInput.value;
      var password2 = password2Input.value;
      console.log(password);
      console.log(password_2);
      if (password != password2) {
          incorrectPassword2.style.display = 'block';
          incorrectPassword2.textContent = 'Las contraseñas no coinciden';
          correctPassword2.style.display = 'none';
          correctPassword1.style.display = 'none';
        } else {
          correctPassword2.style.display = 'block';
          correctPassword2.textContent = 'Las contraseñas si coinciden';
          correctPassword1.style.display = 'block';
          correctPassword1.textContent = 'Las contraseñas si coinciden';
          incorrectPassword2.style.display = 'none';
      }
  }
  


</script>

<style>
  .error-message {
    width:fit-content;
    color: red;
    margin-top: -15px;
    padding:0px 0px 3px 0px; 
    text-align:left;
    border-bottom:1px solid red;
    margin-bottom: 8px;
    margin-top:10px;
    font-size:14px;
  }
  
  .valid-message {
    width:fit-content;
    color: green;
    margin-top: -15px;
    padding:0px 0px 3px 0px; 
    font-size:14px;
    text-align:left;
    border-bottom:1px solid green;
    margin-bottom: 8px;
    margin-top:10px;
}
</style>
