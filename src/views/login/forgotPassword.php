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
    let timeRemaining = 0;
    function sendOTPEmail() {
        const emailForgot = $("#forgot-password-input").val();
        const inputOTP = document.getElementById('input-form-OTP');
        inputOTP.innerHTML = `<fieldset class="fieldset-login">
                    <legend>Mã OTP</legend>
                    <input class="input_login" type="number" id="input-OTP"
                        placeholder="Nhập mã OTP nhận được..." />
                    <button class="button-send-again">Gửi lại</button>
                    <span class="error_message">Địa chỉ Email không được để trống &lowast;</span>
                </fieldset>`
        const buttonSendAgain = document.querySelector('.button-send-again');
        let intervalId;
        let intervalId1;
        if (timeRemaining === 0) {
            updateCD();
        } else {
            updateTimeRemainingDisplay();  
            buttonSendAgain.disabled = true;
            intervalId1 = setInterval(decrementTimeRemaining1, 1000);
            
        }
        function updateCD() {
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
        function decrementTimeRemaining1() {
            timeRemaining--;
            updateTimeRemainingDisplay();
            if (timeRemaining === 0) {
                clearInterval(intervalId);
                buttonSendAgain.disabled = false;
                buttonSendAgain.textContent = 'Gửi lại';
            }
        }
 
        function updateTimeRemainingDisplay() {
            buttonSendAgain.textContent = `Gửi lại (${timeRemaining}s)`;
        }
        function updateTimeRemainingDisplay1() {
            buttonSendAgain.textContent = `Gửi lại (${timeRemaining}s)`;
        }
    }
</script>
// if (!emailForgot) {
        //     notification({
        //         status: "warning",
        //         msg: "Vui lòng nhập email lấy lại tài khoản!",
        //         path: "",
        //     });
        //     return;
        // }
// const randomOTP = Math.floor(100000 + Math.random() * 900000);
// const infoUserForgot = {
// to_email: emailForgot,
// otp_code: randomOTP
// };

// emailjs.send('service_wb0cp5n', 'template_dbfvt7a', infoUserForgot)
// .then(function () {
// console.log('Success to send email:')
// }, function (error) {
// console.log('Failed to send email:', error);
// });