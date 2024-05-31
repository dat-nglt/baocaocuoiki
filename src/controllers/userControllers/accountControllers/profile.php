<?php
if (isset($_SESSION['user'])) {
    if (isset($_POST['save-profile'])) {
        updateAccount($conn, $_SESSION['user']['maNguoiDung'], $_POST['user-name'], $_POST['name'], $_POST['email'], $_POST['tel'], $_POST['check-sex'], $_POST['address'], $_POST['date']);
        // $_SESSION['user'] = mysqli_fetch_assoc(checkAccount($conn, $_POST['user-name'], $_POST['pass'], 'login'));
    }
    if (isset($_POST['save-password'])) {
        $passwordDB = $_SESSION['user']['matKhau'];
        $passwordCurrent = $_POST['password-current'];
        $password = $_POST['password-field'];
        $passwordConfirm = $_POST['repassword-field'];

        if ($password === $passwordConfirm && password_verify($passwordCurrent, $passwordDB)) {
            $passwordHash = password_hash($_POST['password-field'], PASSWORD_DEFAULT);
            updatePassword($conn, $_SESSION['user']['maNguoiDung'], $passwordHash);
            $_SESSION['user']['matKhau'] = $passwordHash;
            successTimeout('Đổi mật khẩu thành công', 'index.php?page=profile');
        } else {
            errorTimeout('Đổi mật khẩu thất bại', 'index.php?page=profile');
        }
    }
    include ("./views/user/user-account.php");
    return;
} else {
    include ("./views/user/user-homepage.php");
    return;
}
?>