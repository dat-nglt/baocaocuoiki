<?php
include ("./serviceAjax.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $accountSignIn = preg_replace('/\s+/', '', trim($_POST['accountSignIn']));
  $emailSignIn = $_POST['emailSignIn'];
  $passwordSignInConfirm = preg_replace('/\s+/', '', trim($_POST['passwordSignInConfirm']));
  $passwordSignIn = preg_replace('/\s+/', '', trim($_POST['passwordSignIn']));
  if (empty($accountSignIn) || empty($passwordSignInConfirm) || empty($emailSignIn) || empty($passwordSignIn)) {
    responseMessage('warning', 'Vui lòng điền đầy đủ thông tin đăng kí!', '');
  } else {
    $passwordHashed = password_hash($passwordSignInConfirm, PASSWORD_DEFAULT);
    $checkAccountSQL = "SELECT * FROM nguoidung WHERE tenTaiKhoan = '$accountSignIn'";
    $checkEmailSQL = "SELECT * FROM nguoidung WHERE email = '$emailSignIn'";
    $signInSQL = "INSERT INTO 
    nguoidung(tenTaiKhoan, email, matKhau) 
    VALUES ('" . $accountSignIn . "','" . $emailSignIn . "','" . $passwordHashed . "')";

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
