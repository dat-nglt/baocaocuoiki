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
  $category = $_POST['category'];
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

  if($category === ''){
    $response = array(
      'status' => 'warning',
      'msg' => 'Vui lòng nhập thêm thương hiệu',
      'path' => "index.php?page=banner"
    );
    echo json_encode($response);
    return;
  }
    $sql = "UPDATE banner SET imgUrl = '$image', idClassify = '$category' WHERE id = 1";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $response = array(
        'status' => 'success',
        'msg' => 'Chỉnh sửa banner chính thành công',
        'path' => "index.php?page=banner"
      );
      echo json_encode($response);
    } else {
      $response = array(
        'status' => 'error',
        'msg' => 'Chỉnh sửa banner chính không thành công',
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