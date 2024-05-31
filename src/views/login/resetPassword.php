<div class="login main" id="login-main">
  <form action="" id="form-forget" method="POST">
    <div id="login__title">
      Đổi mật khẩu
    </div>
    <div class="login__input">
      <div class="login__input__box">
        <fieldset style="min-width: 380px;">
          <legend>Mật khẩu mới</legend>
          <input class="input_login input_login_password" type="password" autocomplete="" name="password-signin"
            id="input_update_password" placeholder="Mật khẩu..." />
          <i class="eye fa-regular fa-eye-slash"></i>
          <span class="error_message">Mật khẩu không được để
            trống &lowast;</span>
        </fieldset>
      </div>
      <div class="login__input__box">
        <fieldset style="min-width: 380px;">
          <legend>Nhập lại mật khẩu mới</legend>
          <input class="input_login input_login_password" type="password" autocomplete="" name="password-signin"
            id="input_update_password_confirm" placeholder="Mật khẩu xác nhận..." />
          <i class="eye fa-regular fa-eye-slash"></i>
          <span class="error_message">Mật khẩu nhập lại không được để
            trống &lowast;</span>
        </fieldset>
      </div>
      <div class="login__input__box" id="input-form-OTP"></div>
      <button onclick="updatePassword()" type="button" class="submit_login_btn" id="submit-update-password"
        name="login">
        Đặt lại mật khẩu
      </button>
    </div>
  </form>
</div>

<script>
  var login_or_register = true;
  var show = false;
  const changeBtn = document.querySelectorAll(".change-form");
  const formLogin = document.querySelector("#form-login");
  const formSignin = document.querySelector("#form-signin");

  const eyes = document.querySelectorAll(".eye");
  const errorInfo = document.querySelectorAll(".error_message");
  const passwordInput = document.querySelectorAll(".input_login_password");

  const inputLogin = document.querySelectorAll(".input_login");


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
</script>

<script>
  function updatePassword() {
    const password = $('#input_update_password').val();
    const passwordConfirm = $('#input_update_password_confirm').val();
    const emailForget = sessionStorage.getItem('emailForget');
    if (!password || !passwordConfirm) {
      notification({
        status: "warning",
        msg: "Vui lòng nhập đầy đủ thông tin",
        path: "",
      });
      return;
    }

    if (password != passwordConfirm) {
      notification({
        status: "warning",
        msg: "Nhập lại mật khẩu không chính xác",
        path: "",
      });
      return;
    }


    $.ajax({
      url: "../src/services/resetPassword.php",
      type: "POST",
      dataType: "json",
      data: {
        passwordConfirm,
        emailForget
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
      showConfirmButton: true,
    }).then(function () {
      if (result.path != "") {
        window.location.assign(result.path);
      }
    });
  }
</script>