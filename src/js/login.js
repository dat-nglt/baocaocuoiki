var login_or_register = true;
var show = false;
const changeBtn = document.querySelectorAll(".change-form");

const formLogin = document.querySelector("#form-login");
const formSignin = document.querySelector("#form-signin");

const eyes = document.querySelectorAll(".eye");

const errorInfo = document.querySelectorAll(".error_message");

const loginBtn = document.querySelector("#submit-login-input");

const passwordInput = document.querySelectorAll(".input_login_password");

const inputLogin = document.querySelectorAll(".input_login");

changeBtn.forEach((ChangeFormElement, index) => {
  ChangeFormElement.addEventListener("click", () => {
    login_or_register = !login_or_register;
    console.log(login_or_register);
    if (login_or_register) {
      formLogin.style.display = "block";
      formSignin.style.display = "none";
    } else {
      formLogin.style.display = "none";
      formSignin.style.display = "block";
    }
  });
});

inputLogin.forEach((input, index) => {
  input.addEventListener("blur", function () {
    errorInfo[index].style.display = input.value === "" ? "block" : "none";
  });
});

// inputLogin.forEach((element) => {
//   element.addEventListener("input", function () {
//     loginBtn.disabled = Array.from(inputLogin).some(
//       (input) => input.value === ""
//     );
//   });
// });

eyes.forEach((eye, index) => {
  eye.addEventListener("click", function () {
    show = !show;
    passwordInput[index].type = show ? "text" : "password";
    eye.classList.toggle("fa-eye-slash");
    eye.classList.toggle("fa-eye");
  });
});
