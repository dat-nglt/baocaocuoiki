<?php
include ("./serviceAjax.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $currentPass = preg_replace('/\s+/', '', $_POST['currentPass']);
  $newPassword = preg_replace('/\s+/', '', $_POST['newPassword']);
  $confirmPassword = preg_replace('/\s+/', '', $_POST['confirmPassword']);
  $passwordSession = $_SESSION['user']['matKhau'];
  $idUser = $_SESSION['user']['maNguoiDung'];

  if (empty($currentPass) || empty($newPassword) || empty($confirmPassword)) {
    responseMessage('warning', 'Vui lòng điền đầy đủ thông tin!', '');
  } else if (!password_verify($currentPass, $passwordSession)) {
    responseMessage('warning', 'Mật khẩu cũ không chính xác!', '');
  } else {
    $passwordHash = password_hash($confirmPassword, PASSWORD_DEFAULT);
    $changePasswordSQL = "UPDATE nguoidung SET matKhau = '$passwordHash' WHERE maNguoiDung = '$idUser';";
    $resultChangePassword = mysqli_query($conn, $changePasswordSQL);
    if ($resultChangePassword) {
      $_SESSION['user']['matKhau'] = $passwordHash;
      responseMessage('success', 'Cập nhật mật khẩu thành công!', '');
    } else {
      responseMessage('success', 'Cập nhật mật khẩu thất bại!', '');
    }
  }
}