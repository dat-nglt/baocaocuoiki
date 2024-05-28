<?php
$serverName = "localhost";
$userName = "root";
$passWord = "";
$database = "laptop_z3g";

$conn = mysqli_connect($serverName, $userName, $passWord, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $maSanPham = $_POST['id'];
  $sql = "SELECT sanpham.moTa FROM sanpham WHERE sanpham.maSanPham = $maSanPham";
  $result = mysqli_fetch_row(mysqli_query($conn, $sql));
  $data = $result ? $result : [];
  $response = array(
    'data' => $result,
  );
  echo json_encode($response);
}