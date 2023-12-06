<div class="login main" id="login-main">
    <form action="" id="form-login" method="POST">
        <i class="fa-solid fa-right-to-bracket fa-shake"></i>
        <div class="title">Đăng Nhập</div>
        <input type="text" name="name-login" id="account-name-input" required placeholder="Tên đăng nhập">
        <input type="password" name="password-login" id="account-password-input" required placeholder="Mật khẩu">
        <input type="submit" id="submit-login-input" name="login" value="ĐĂNG NHẬP">
        <p class="check-text">Bạn là thành viên mới? <span class="change-form">Đăng ký</span></p>
    </form>
    
    <form action="" id="form-signin" method="POST">
        <i class="fa-solid fa-right-to-bracket fa-shake"></i>
        <div class="title">Đăng Ký</div>
        <input type="text" name="name-signin" class="inputSignIn" id="account-name-input-signin" required placeholder="Tên đăng nhập">
        <input type="password" name="password-signin" class="inputSignIn" id="account-password-signin-input" required placeholder="Mật khẩu">
        <input type="password" name="repassword-signin" class="inputSignIn" id="account-repassword-signin-input" required
        placeholder="Nhập lại mật khẩu">
        <i id="warning-acc" class="none">Tên tài khoản không được có khoảng cách hoặc dấu</i>
        <i id="warning-pass" class="none">Mật khẩu phải từ 8 kí tự</i>
        <i id="warning-repass" class="none">Mật khẩu không trùng khớp</i>
        <input type="submit" id="submit-login-input" name="signIn" value="ĐĂNG KÝ">
        <p class="check-text">Bạn đã có tài khoản? <span class="change-form">Đăng nhập</span></p>
    </form>
</div>

<script src="./js/login.js"></script>