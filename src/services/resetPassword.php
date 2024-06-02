<?php
include ("./serviceAjax.php");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $password = $_POST['password'];
  $passwordConfirm = $_POST['passwordConfirm'];
  $emailForget = $_POST['emailForget'];

  if (empty($passwordConfirm) || empty($emailForget) || empty($password)) { //Validation mật khẩu mới và email đăng kí
    responseMessage('warning', 'Vui lòng nhập đầy đủ thông tin!', '');
  } else {
    $newPassword = password_hash($passwordConfirm, PASSWORD_DEFAULT);
    $updatePasswordSQL = "UPDATE nguoidung 
    SET nguoidung.matKhau = '$newPassword' 
    WHERE nguoidung.email = '$emailForget';";
    $resultUpdatePassword = mysqli_query($conn, $updatePasswordSQL);
    if ($resultUpdatePassword) {
      responseMessage('success', 'Đặt lại mật khẩu thành công', 'http://localhost/baocaocuoiki/src/index.php?page=login');
      session_unset();
    } else {
      responseMessage('warning', 'Đặt lại mật khẩu không thành công', '');

    }
  }
}
