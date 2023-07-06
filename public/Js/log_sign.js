// var $loginMsg = $(".loginMsg"),
//   $login = $(".login"),
//   $signupMsg = $(".signupMsg"),
//   $signup = $(".signup"),
//   $frontbox = $(".frontbox");

// $("#switch1").on("click", function () {
//   $loginMsg.toggleClass("visibility");
//   $frontbox.addClass("moving");
//   $signupMsg.toggleClass("visibility");

//   $signup.toggleClass("hide");
//   $login.toggleClass("hide");
// });

// $("#switch2").on("click", function () {
//   $loginMsg.toggleClass("visibility");
//   $frontbox.removeClass("moving");
//   $signupMsg.toggleClass("visibility");

//   $signup.toggleClass("hide");
//   $login.toggleClass("hide");
// });

// setTimeout(function () {
//   $("#switch1").click();
// }, 1000);

// setTimeout(function () {
//   $("#switch2").click();
// }, 3000);

const loginMsg = document.querySelector(".loginMsg");
const login = document.querySelector(".login");
const signupMsg = document.querySelector(".signupMsg");
const signup = document.querySelector(".signup");
const frontbox = document.querySelector(".frontbox");

// document.querySelector("#switch1").addEventListener("click", function () {
//   loginMsg.classList.toggle("visibility");
//   frontbox.classList.add("moving");
//   signupMsg.classList.toggle("visibility");

//   signup.classList.toggle("hide");
//   login.classList.toggle("hide");
// });

// document.querySelector("#switch2").addEventListener("click", function () {
//   loginMsg.classList.toggle("visibility");
//   frontbox.classList.remove("moving");
//   signupMsg.classList.toggle("visibility");

//   signup.classList.toggle("hide");
//   login.classList.toggle("hide");
// });

document.querySelector("#switch1").addEventListener("click", function (event) {
  loginMsg.classList.toggle("visibility");
  frontbox.classList.add("moving");
  signupMsg.classList.toggle("visibility");

  signup.classList.toggle("hide");
  login.classList.toggle("hide");
});

document.querySelector("#switch2").addEventListener("click", function (event) {
  loginMsg.classList.toggle("visibility");
  frontbox.classList.remove("moving");
  signupMsg.classList.toggle("visibility");

  signup.classList.toggle("hide");
  login.classList.toggle("hide");
});


// setTimeout(function () {
//   document.querySelector("#switch1").click();
// }, 1000);

// setTimeout(function () {
//   document.querySelector("#switch2").click();
// }, 3000);

function togglePasswordVisibility(inputId) {
  var input = document.getElementById(inputId);
  var toggle = document.querySelector("span.password-toggle");
  if (input.type === "password") {
    input.type = "text";
    toggle.style.backgroundImage = "url('https://cdn-icons-png.flaticon.com/512/3722/3722014.png')";
  } else {
    input.type = "password";
    toggle.style.backgroundImage = "url('https://cdn-icons-png.flaticon.com/512/3722/3722014.png')";
  }
}

document.querySelector("button.boton_registrar_paciente").addEventListener("click", function(event) {
  var password1 = document.getElementById("password_1").value;
  var password2 = document.getElementById("password_2").value;
  var errorMessage = document.getElementById("error-message");

  if (password1 !== password2) {
    errorMessage.innerText = "Las contraseñas deben ser iguales";
    errorMessage.style.display = "block";
    event.preventDefault();
  } else {
    errorMessage.style.display = "none";
  }
});
