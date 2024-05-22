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
  $name = $_POST['name'];
  $price = $_POST['price'];
  $count = $_POST['count'];
  $brand = $_POST['brand'];
  $des = $_POST['des'];

  if($count < 0){
    $count = 0;
  }

  if(isset($_POST['image'])){
    $image = $_POST['image'];
  }else{
    $image = '';
  }
  $sql = "select * from sanpham where tenSanPham = '$name'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) < 1) {
    $sql = "INSERT INTO sanpham VALUES ('', '$name', '$image', '$price', '$count', '$des', '', '', '$brand', '1')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $response = array(
        'status' => 'success',
        'msg' => 'Thêm sản phẩm thành công',
        'path' => "index.php?page=listproducts"
      );
      echo json_encode($response);
    } else {
      $response = array(
        'status' => 'error',
        'msg' => 'Thêm sản phẩm không thành công',
        'path' => "index.php?page=listproducts"
      );
      echo json_encode($response);
    }
  } else {
    $response = array(
      'status' => 'error',
      'msg' => 'Tên sản phẩm đã tồn tại',
      'path' => "index.php?page=listproducts"
    );
    echo json_encode($response);
  }

} else {
  $response = array(
    'status' => 'success',
    'msg' => 'Lỗi không thể thêm sản phẩm',
    'path' => "index.php?page=listproducts"
  );
  echo json_encode($response);
}

$conn = null;