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
  $accountSignIn = $_POST['accountSignIn'];
  $emailSignIn = $_POST['emailSignIn'];
  $passwordSignInConfirm = $_POST['passwordSignInConfirm'];

  $checkAccountSQL = "SELECT * FROM nguoidung WHERE tenTaiKhoan = '$accountSignIn'";
  $checkEmailSQL = "SELECT * FROM nguoidung WHERE email = '$emailSignIn'";
  $signInSQL = "INSERT INTO 
  nguoidung(tenTaiKhoan, email, matKhau) 
  VALUES ('" . $accountSignIn . "','" . $emailSignIn . "','" . $passwordSignInConfirm . "')";

  if (empty($accountSignIn) || empty($passwordSignInConfirm) || empty($emailSignIn)) {
    responseMessage('warning', 'Vui lòng điền đầy đủ thông tin đăng kí!', '');
  } else {
    $resultCheckAccount = mysqli_fetch_assoc(mysqli_query($conn, $checkAccountSQL));
    $resultCheckEmail = mysqli_fetch_assoc(mysqli_query($conn, $checkEmailSQL));
    if (!isset($resultCheckAccount)) {
      if (!isset($resultCheckEmail)) {
        mysqli_query($conn, $signInSQL);
        responseMessage('success', 'Đăng kí thành công', 'http://localhost/baocaocuoiki/src/index.php?page=login');
      } else {
        responseMessage('warning', 'Tài khoản Email đã được đăng kí', '');
      }

    } else {
      responseMessage('error', 'Tên tài khoản không tồn tại', '');
    }
  }
}
