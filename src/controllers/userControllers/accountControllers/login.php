<?php
if (isset($_POST['signIn'])) {
    $username = $_POST['name-signin'];
    $email = $_POST['email-signin'];
    $password = password_hash($_POST['password-signin'], PASSWORD_DEFAULT);
    if (mysqli_num_rows(checkAccountWithUsername($conn, $username)) == 0) {
        if (mysqli_num_rows(checkAccountWithEmail($conn, $email)) == 0) {
            signIn($conn, $username, $email, $password, $time);
            success('Đăng kí thành công', 'http://localhost/baocaocuoiki/src/index.php?page=login');
        } else {
            warning('Tài khoản email đã tồn tại', 'http://localhost/baocaocuoiki/src/index.php?page=login');
        }
    } else {
        warning('Tên tài khoản đã tồn tại', 'http://localhost/baocaocuoiki/src/index.php?page=login');
    }

}

if (isset($_POST['login'])) { // Kiểm tra có yêu cầu đăng nhập được  gửi lên
    $username = $_POST['name-login'];
    $password = $_POST['password-login'];
    $hash = mysqli_fetch_assoc(checkAccountWithUsername($conn, $username));
    if ($hash['tenTaiKhoan']) {
        if (password_verify($password, $hash['matKhau'])) {
            $_SESSION['user'] = mysqli_fetch_assoc(checkAccountWithUsername($conn, $username));
            if ($_SESSION['user']['quyenTruyCap'] == 2) {
                success('Đăng nhập thành công', 'http://localhost/baocaocuoiki/admin/');
            } else {
                success('Đăng nhập thành công', 'http://localhost/baocaocuoiki/src/index.php');
            }
        } else {
            error('Mật khẩu không chính xác', 'http://localhost/baocaocuoiki/src/index.php?page=login');
        }
    } else {
        error('Tên tài khoản không tồn tại', 'http://localhost/baocaocuoiki/src/index.php?page=login');
    }
}

include ("./views/login/login.php");
return;
?>