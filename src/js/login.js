var login_or_register = true;
var show = false;
// các phần tử chuyển form đăng kí đăng nhập
const changeBtn = document.querySelectorAll(".change-form");
const formLogin = document.querySelector("#form-login");
const formSignin = document.querySelector("#form-signin");

// Các phần tử chuyển type password
const eyes = document.querySelectorAll(".eye");
const errorInfo = document.querySelectorAll(".error_message");
const passwordInput = document.querySelectorAll(".input_login_password");

// Phần tử để validation cho form
const inputLogin = document.querySelectorAll(".input_login");

// module chuyển form
changeBtn.forEach((ChangeFormElement, index) => {
  ChangeFormElement.addEventListener("click", () => {
    login_or_register = !login_or_register;
    if (login_or_register) {
      formLogin.style.display = "block";
      formSignin.style.display = "none";
    } else {
      formLogin.style.display = "none";
      formSignin.style.display = "block";
    }
  });
});

// module check empty value
inputLogin.forEach((input, index) => {
  input.addEventListener("blur", function () {
    errorInfo[index].style.display = input.value === "" ? "block" : "none";
  });
});

// module chuyển type password
eyes.forEach((eye, index) => {
  eye.addEventListener("click", function () {
    show = !show;
    passwordInput[index].type = show ? "text" : "password";
    eye.classList.toggle("fa-eye-slash");
    eye.classList.toggle("fa-eye");
  });
});

function submitLogin() {
  const passwordPattern =
    /^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/;

  const account = $("#account-name-login-input").val();
  const password = $("#account-password-login-input").val();

  if (!account || !password) {
    notification({
      status: "warning",
      msg: "Tài khoản và mật khẩu không được để trống!",
      path: "",
    });
    return;
  }

  $.ajax({
    url: "../src/services/loginService.php",
    type: "POST",
    dataType: "json",
    data: {
      account,
      password,
    },
    success: function (result) {
      notification(result);
    },
    error: function (xhr, error) {
      notification({
        status: "error",
        msg: "Đã có lỗi xảy ra",
        path: "",
      });
      return;
    },
  });
}

function submitSignIn() {
  const passwordPattern =
    /^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/;

  const emailPattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

  const accountSignIn = $("#account-name-signin-input").val();
  const passwordSignIn = $("#account-password-signin-input").val();
  const passwordSignInConfirm = $("#account-re-password-signin-input").val();
  const emailSignIn = $("#account-email-signin-input").val();

  if (
    !accountSignIn ||
    !passwordSignIn ||
    !passwordSignInConfirm ||
    !emailSignIn
  ) {
    notification({
      status: "warning",
      msg: "Vui lòng điền đầy đủ thông tin",
      path: "",
    });
    return;
  }

  if (emailSignIn !== "" && !emailPattern.test(emailSignIn)) {
    notification({
      status: "warning",
      msg: "Địa chỉ Email không đúng định dạng!",
      path: "",
    });
    return;
  }

  if (passwordSignIn !== passwordSignInConfirm) {
    notification({
      status: "warning",
      msg: "Nhập lại mật khẩu không trùng khớp!",
      path: "",
    });
    return;
  }

  $.ajax({
    url: "../src/services/signinService.php",
    type: "POST",
    dataType: "json",
    data: {
      accountSignIn,
      passwordSignInConfirm,
      emailSignIn,
    },
    success: function (result) {
      notification(result);
    },
    error: function (xhr, error) {
      notification({
        status: "error",
        msg: "Đã có lỗi xảy ra",
        path: "",
      });
      return;
    },
  });
}

function notification(result) {
  Swal.fire({
    title: "Thông báo",
    text: result.msg,
    icon: result.status,
    timer: 1300,
showConfirmButton: false,
  }).then(function () {
    if (result.path != "") {
      window.location.assign(result.path);
    }
  });
}
