<?php
if (isset($_SESSION['user'])) {
    if (isset($_POST['save-profile'])) {
        updateAccount($conn, $_SESSION['user']['maNguoiDung'], $_POST['user-name'], $_POST['name'], $_POST['email'], $_POST['tel'], $_POST['check-sex'], $_POST['address'], $_POST['date']);
        $_SESSION['user'] = mysqli_fetch_assoc(checkAccount($conn, $_POST['user-name'], $_POST['pass'], 'login'));
    }
    if (isset($_POST['save-password'])) {
        $passwordDB = $_SESSION['user']['matKhau'];
        // $passwordCurrent = password_hash($_POST['password-current'], PASSWORD_DEFAULT);
        $passwordCurrent = $_POST['password-current'];
        $password = password_hash($_POST['repassword-field'], PASSWORD_DEFAULT);

        if (password_verify($passwordDB, $passwordCurrent)) {
            updatePassword($conn, $_SESSION['user']['maNguoiDung'], $password);
            echo 'aaa';
        } else {
            echo 'hihi';
        }
    }
    include ("./views/user/user-account.php");
    return;
} else {
    include ("./views/user/user-homepage.php");
    return;
}
?>