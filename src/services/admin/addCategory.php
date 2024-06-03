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
    $name = preg_replace('/\s+/', ' ', trim($_POST['name']));
    $image = $_POST['image'];

    if($name === ''){
      $response = array(
        'status' => 'warning',
        'msg' => 'Tên thương hiệu không được bỏ trống',
        'path' => "index.php?page=listclassify"
      );
      echo json_encode($response);
    }

  $sql = "select * from phanloai where tenLoai = '$name'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) < 1) {
    $sql = "INSERT INTO phanloai VALUES ('', '$name', '$image')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $response = array(
        'status' => 'success',
        'msg' => 'Thêm thương hiệu thành công',
        'path' => "index.php?page=listclassify"
      );
      echo json_encode($response);
    } else {
      $response = array(
        'status' => 'error',
        'msg' => 'Thêm thương hiệu không thành công',
        'path' => "index.php?page=listclassify"
      );
      echo json_encode($response);
    }
  } else {
    $response = array(
      'status' => 'error',
      'msg' => 'Tên thương hiệu đã tồn tại',
      'path' => "index.php?page=listclassify"
    );
    echo json_encode($response);
  }

} else {
  $response = array(
    'status' => 'success',
    'msg' => 'Lỗi không thể thêm thương hiệu',
    'path' => "index.php?page=listclassify"
  );
  echo json_encode($response);
}

$conn = null;