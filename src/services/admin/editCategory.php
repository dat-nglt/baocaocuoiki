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
  $id = $_POST['id'];
  $name = $_POST['name'];
  $image = $_POST['image'];

  $sql = "select * from phanloai where maLoai = '$id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_fetch_assoc($result)['tenLoai'] === $name) {
    $sql = "UPDATE phanloai SET tenLoai = '$name', anhLoai = '$image' WHERE maLoai = '$id'";
    $result = mysqli_query($conn, $sql);
        if ($result) {
          $response = array(
            'status' => 'success',
            'msg' => 'Chỉnh sửa thương hiệu thành công',
            'path' => "index.php?page=listclassify"
          );
          echo json_encode($response);
        } else {
          $response = array(
            'status' => 'error',
            'msg' => 'Chỉnh sửa thương hiệu không thành công.',
            'path' => "index.php?page=listclassify"
          );
          echo json_encode($response);
        }
  }else{
    $sql = "select * from phanloai where tenLoai = '$name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $response = array(
        'status' => 'error',
        'msg' => 'Tên sản phẩm đã tồn tại',
        'path' => "index.php?page=listproducts"
      );
      echo json_encode($response);
    }else{
      $sql = "UPDATE phanloai SET tenLoai = '$name', anhLoai = '$image' WHERE maLoai = '$id'";
      $result = mysqli_query($conn, $sql);
          if ($result) {
            $response = array(
              'status' => 'success',
              'msg' => 'Chỉnh sửa thương hiệu thành công',
              'path' => "index.php?page=listclassify"
            );
            echo json_encode($response);
          } else {
            $response = array(
              'status' => 'error',
              'msg' => 'Chỉnh sửa thương hiệu không thành công.',
              'path' => "index.php?page=listclassify"
            );
            echo json_encode($response);
          }
    }
  }


} else {
  $response = array(
    'status' => 'success',
    'msg' => 'Lỗi không thể cập nhật dữ liệu',
    'path' => "index.php?page=listclassify"
  );
  echo json_encode($response);
}

$conn = null;