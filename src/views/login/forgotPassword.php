<div class="login main" id="login-main">
    <form action="" id="form-forget" method="POST">
        <div id="login__title">
            Quên mật khẩu
        </div>
        <div class="login__input">
            <div class="login__input__box">
                <fieldset class="fieldset-login">
                    <legend>Địa chỉ Email</legend>
                    <input class="input_login" type="email" id="forgot-password-input"
                        placeholder="Email đăng kí tài khoản..." />
                    <span class="error_message">Địa chỉ Email không được để trống &lowast;</span>
                </fieldset>
            </div>
            <div class="login__input__box" id="input-form-OTP"></div>
            <button onclick="sendOTPEmail()" type="button" class="submit_login_btn" id="submit-forgot-input"
                name="login">
                Gửi
            </button>
        </div>
    </form>
</div>
</script>
<script src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
<script type="text/javascript">
    (function () {
        emailjs.init({
            publicKey: "tMdvyY9GHRPfbn7TI",
        });
    })();
</script>
<script>
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

    function setTimeCD(){
        const buttonSendAgain = document.querySelector('.button-send-again');
            let timeRemaining = 0;
            let intervalId;
            if (timeRemaining === 0) {
                timeRemaining = 60;
                updateTimeRemainingDisplay();
                intervalId = setInterval(decrementTimeRemaining, 1000);
                buttonSendAgain.disabled = true;
            }
            function decrementTimeRemaining() {
                timeRemaining--;
                updateTimeRemainingDisplay();
                if (timeRemaining === 0) {
                    clearInterval(intervalId);
                    buttonSendAgain.disabled = false;
                    buttonSendAgain.textContent = 'Gửi lại';
                }
            }
            function updateTimeRemainingDisplay() {
                buttonSendAgain.textContent = `Gửi lại(${timeRemaining}s)`;
            }
    }

    function sendOTPEmail() {
        const emailForgot = $("#forgot-password-input").val();
        const emailPattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

        if (!emailForgot) {
            notification({
                status: "warning",
                msg: "Vui lòng nhập email lấy lại tài khoản!",
                path: "",
            });
            return;
        }

        if (emailForgot !== "" && !emailPattern.test(emailForgot)) {
            notification({
                status: "warning",
                msg: "Địa chỉ Email không đúng định dạng!",
                path: "",
            });
            return;
        }

        const randomOTP = Math.floor(100000 + Math.random() * 900000);
        const infoUserForgot = {
        to_email: emailForgot,
        otp_code: randomOTP
        };

        emailjs.send('service_wb0cp5n', 'template_dbfvt7a', infoUserForgot)
        .then(function () {
        const inputOTP = document.getElementById('input-form-OTP');
        const fieldsetLogin = inputOTP.querySelector('.fieldset-login');

        if (!fieldsetLogin) {
            inputOTP.innerHTML = `<fieldset class="fieldset-login">
                    <legend>Mã OTP</legend>
                    <input class="input_login" style="width: 80%" maxlength="6" type="number" id="input-OTP"
                        placeholder="Nhập mã OTP nhận được..." />
                    <button class="button-send-again" onclick="reSendOTP()">Gửi lại</button>
                    <span class="error_message">Địa chỉ Email không được để trống &lowast;</span>
                </fieldset>`;
                setTimeCD()
        }
        }, function (error) {
            notification({
                status: "error",
                msg: "Không thể gửi gmail",
                path: "",
            });
            return;
        });
    }

    function reSendOTP() {
        const emailForgot = $("#forgot-password-input").val();
        const emailPattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

        if (!emailForgot) {
            notification({
                status: "warning",
                msg: "Vui lòng nhập email lấy lại tài khoản!",
                path: "",
            });
            return;
        }

        if (emailForgot !== "" && !emailPattern.test(emailForgot)) {
            notification({
                status: "warning",
                msg: "Địa chỉ Email không đúng định dạng!",
                path: "",
            });
            return;
        }

        setTimeCD()
        
        const randomOTP = Math.floor(100000 + Math.random() * 900000);
        const infoUserForgot = {
        to_email: emailForgot,
        otp_code: randomOTP
        };

        emailjs.send('service_wb0cp5n', 'template_dbfvt7a', infoUserForgot)
        .then(function () {}, function (error) {
            notification({
                status: "error",
                msg: "Không thể gửi gmail",
                path: "",
            });
            return;
        })
    }
</script>