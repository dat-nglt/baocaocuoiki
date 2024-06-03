<?php
include ("./serviceAjax.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $profileFullname = preg_replace('/\s+/', '', $_POST['profileFullname']);
  $profileAddress = preg_replace('/\s+/', '', $_POST['profileAddress']);
  $profileGender = $_POST['profileGender'];
  $profileNumberphone = $_POST['profileNumberphone'];
  $profileEmail = $_POST['profileEmail'];
  $profileDOB = $_POST['profileDOB'];
  $idUser = $_SESSION['user']['maNguoiDung'];


  if (
    empty($profileFullname) ||
    empty($profileAddress) ||
    empty($profileGender) ||
    empty($profileNumberphone) ||
    empty($profileEmail) ||
    empty($profileDOB)
  ) {
    responseMessage('warning', 'Vui lòng điền đầy đủ thông tin!', '');
  } else {
    $changeProfileSQL = "UPDATE nguoidung 
    SET tenNguoiDung = '$profileFullname', 
    email= '$profileEmail', 
    soDienThoai= '$profileNumberphone', 
    gioiTinh= '$profileGender', 
    diaChi = '$profileAddress', 
    ngaySinh= '$profileDOB' 
    WHERE maNguoiDung = '$idUser'";

    $getFullInfoSQL = "SELECT * FROM nguoidung WHERE maNguoiDung = '$idUser'";


    $resultChangeProfile = mysqli_query($conn, $changeProfileSQL);
    if ($resultChangeProfile) {
      $_SESSION['user'] = mysqli_fetch_assoc(mysqli_query($conn, $getFullInfoSQL));
      responseMessage('success', 'Cập nhật thông tin thành công!', '');
    } else {
      responseMessage('success', 'Cập nhật thông tin thất bại!', '');
    }
  }
}