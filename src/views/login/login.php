<div class="login main" id="login-main">
    <form action="" id="form-login">
        <div id="login__title">
            Đăng Nhập
        </div>
        <div class="login__input">
            <div class="login__input__box">
                <fieldset class="fieldset-login">
                    <legend>Tài khoản</legend>
                    <input class="input_login" type="text" name="name-login" id="account-name-login-input"
                        placeholder="Tên đăng nhập..." />
                    <span class="error_message">Tài khoản không được để
                        trống &lowast;</span>
                </fieldset>
            </div>
            <div class="login__input__box">

                <fieldset class="fieldset-login">
                    <legend>Mật khẩu...</legend>
                    <input class="input_login input_login_password" type="password" autocomplete=""
                        name="password-login" id="account-password-login-input" placeholder="Mật khẩu" />
                    <span class="error_message">Mật khẩu không được để
                        trống &lowast;</span>
                    <i class="fa-regular fa-eye-slash eye"></i>
                </fieldset>
            </div>

            <!-- <div id="remember_login">
                <input type="checkbox" name="remember_login" id="" />
                <span>Ghi nhớ đăng nhập</span>
            </div> -->

            <p class="check-text" style="text-align: left;">
                <a href="index.php?page=forgot-password" style="color: var(--blue-cl)">Quên mật khẩu?</a>
            </p>
            <button onclick="submitLogin()" type="button" class="submit_login_btn" id="submit-login-input" name="login">
                Đăng nhập
            </button>

            <p class="check-text">
                Bạn là thành viên mới?
                <span class="change-form">Đăng ký</span>
            </p>

        </div>
    </form>
    <form action="" id="form-signin">
        <div id="login__title">
            Đăng Kí
        </div>
        <div class="login__input">
            <div class="login__input__box">
                <fieldset>
                    <legend>Tài khoản</legend>
                    <input class="input_login" type="text" name="name-signin" id="account-name-signin-input"
                        placeholder="Tên đăng nhập..." />
                    <span class="error_message">Tài khoản không được để
                        trống &lowast;</span>
                </fieldset>
            </div>
            <div class="login__input__box">
                <fieldset>
                    <legend>Email</legend>
                    <input class="input_login" type="email" name="email-signin" id="account-email-signin-input"
                        placeholder="Tài khoản Email..." />
                    <span class="error_message">Địa chỉ email không
                        được để trống
                        &lowast;</span>
                </fieldset>
            </div>
            <div class="login__input__box">
                <fieldset>
                    <legend>Mật khẩu</legend>
                    <input class="input_login input_login_password" type="password" autocomplete=""
                        name="password-signin" id="account-password-signin-input" placeholder="Mật khẩu..." />
                    <i class="eye fa-regular fa-eye-slash"></i>
                    <span class="error_message">Mật khẩu không được để
                        trống &lowast;</span>
                </fieldset>
                <fieldset>
                    <legend>
                        Xác nhận mật khẩu
                    </legend>
                    <input class="input_login input_login_password" type="password" autocomplete=""
                        name="re-password-signin" id="account-re-password-signin-input"
                        placeholder="Nhập lại mật khẩu..." />
                    <i class="eye fa-regular fa-eye-slash"></i>
                    <span class="error_message">Mật khẩu không được để
                        trống &lowast;</span>
                </fieldset>
            </div>
            <button onclick="submitSignIn()" type="button" class="submit_login_btn" id="submit-signin-input"
                name="sign-in">
                Đăng kí
            </button>

            <p class="check-text">
                Bạn đã có tài khoản?
                <span class="change-form">Đăng nhập</span>
            </p>
        </div>
    </form>
</div>

<script>

    var login_or_register = true;
    var show = false;
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
            showConfirmButton: true,
        }).then(function () {
            if (result.path != "") {
                window.location.assign(result.path);
            }
        });
    }

</script>

<!-- <script src="./js/login.js"> -->
