<?php
include ("./serviceAjax.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $account = $_POST['account'];
  $password = $_POST['password'];
  $checkAccountSQL = "select * from nguoidung where tenTaiKhoan = '$account'";


  if (empty($account) || empty($password)) {
    responseMessage('warning', 'Tên tài khoản và mật khẩu không được để trống!', '');
  } else {

    $resultCheckAccount = mysqli_fetch_assoc(mysqli_query($conn, $checkAccountSQL));
    if (isset($resultCheckAccount)) {
      if (password_verify($password, $resultCheckAccount['matKhau'])) {
        $_SESSION['user'] = $resultCheckAccount;
        if ($_SESSION['user']['quyenTruyCap'] == 2) {
          responseMessage('success', 'Đăng nhập thành công!', 'http://localhost/baocaocuoiki/admin/index.php?page=charts');
        } else {
          responseMessage('success', 'Đăng nhập thành công!', 'http://localhost/baocaocuoiki/src/');
        }
      } else {
        responseMessage('error', 'Tên đăng nhập hoặc mật khẩu không chính xác!', '');
      }
    } else {
      responseMessage('error', 'Tên đăng nhập hoặc mật khẩu không chính xác!', '');
    }
  }
}
