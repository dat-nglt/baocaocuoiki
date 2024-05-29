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
  $productID = $_POST['productID'];
  $statusLogistics = $_POST['statusLogistics'];
  $quantityLogistics = $_POST['quantityLogistics'];
  $sql = "INSERT INTO logistics 
  (id, 
  idProduct, 
  quantityLogistics, 
  timeLogistics, 
  addessLogistics, 
  noteLogistics, 
  statusLogistics) 
  VALUES (NULL,
  '$productID', 
  '$quantityLogistics', 
  current_timestamp(), 
  'AAA', 
  'aaaa', 
  '$statusLogistics');";
  $result = mysqli_query($conn, $sql);

  $statusLogistics = $statusLogistics == 1 ? 'Nhập sản phẩm' : 'Xuất sản phẩm';
  if ($result) {
    $response = array(
      'status' => 'success',
      'msg' => '' . $statusLogistics . ' thành công.',
      'path' => "index.php?page=logistics"
    );
    echo json_encode($response);
  } else {
    $response = array(
      'status' => 'success',
      'msg' => '' . $statusLogistics . ' không thành công.',
      'path' => "index.php?page=logistics"
    );
    echo json_encode($response);
  }
}