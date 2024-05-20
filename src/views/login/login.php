<div class="login main" id="login-main">
    <form action="" id="form-login" method="POST">
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

            <div id="remember_login">
                <input type="checkbox" name="remember_login" id="" />
                <span>Ghi nhớ đăng nhập</span>
            </div>

            <button type="submit" class="submit_login_btn" id="submit-login-input" name="login">
                Đăng nhập
            </button>

            <p class="check-text">
                Bạn là thành viên mới?
                <span class="change-form">Đăng ký</span>
            </p>
        </div>
    </form>
    <form action="" id="form-signin" method="POST">
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
            <button type="submit" class="submit_login_btn" id="submit-signin-input" name="signIn">
                Đăng kí
            </button>

            <p class="check-text">
                Bạn đã có tài khoản?
                <span class="change-form">Đăng nhập</span>
            </p>
        </div>
    </form>
</div>

<script src="./js/login.js">
</script>