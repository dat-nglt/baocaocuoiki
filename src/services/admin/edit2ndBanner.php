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
  $product = $_POST['product'];
  $image = $_POST['image'];

  if($image === ''){
    $response = array(
      'status' => 'warning',
      'msg' => 'Hình ảnh sản phẩm không hợp lệ',
      'path' => "index.php?page=banner"
    );
    echo json_encode($response);
    return;
  }

  if($product === ''){
    $response = array(
      'status' => 'warning',
      'msg' => 'Vui lòng nhập thêm thương hiệu',
      'path' => "index.php?page=banner"
    );
    echo json_encode($response);
    return;
  }
    $sql = "UPDATE banner SET imgUrl = '$image', idProduct = '$product' WHERE id = 2";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $response = array(
        'status' => 'success',
        'msg' => 'Chỉnh sửa banner phụ thành công',
        'path' => "index.php?page=banner"
      );
      echo json_encode($response);
    } else {
      $response = array(
        'status' => 'error',
        'msg' => 'Chỉnh sửa banner phụ không thành công',
        'path' => "index.php?page=banner"
      );
      echo json_encode($response);
    }
} else {
  $response = array(
    'status' => 'error',
    'msg' => 'Lỗi không thể cập nhật dữ liệu',
    'path' => "index.php?page=banner"
  );
  echo json_encode($response);
}

$conn = null;