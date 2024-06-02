<?php
$serverName = "localhost";
$userName = "root";
$passWord = "";
$database = "laptop_z3g";
session_start();
$conn = mysqli_connect($serverName, $userName, $passWord, $database);
function responseMessage($status, $msg, $path)
{
  $response = array(
    'status' => $status,
    'msg' => $msg,
    'path' => $path
  );
  echo json_encode($response);
}

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $passwordConfirm = $_POST['passwordConfirm'];
  $emailForget = 'dat.nglt@gmail.com';

  if (empty($passwordConfirm) || empty($emailForget)) { //Validation mật khẩu mới và email đăng kí
    responseMessage('warning', 'Tên tài khoản và mật khẩu không được để trống!', '');
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
