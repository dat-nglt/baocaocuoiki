<?php

$serverName = "localhost";
$userName = "root";
$passWord = "";
$database = "laptop_z3g";

$conn = mysqli_connect($serverName, $userName, $passWord, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  parse_str(file_get_contents("php://input"), $_DELETE);
  $itemId = $_DELETE['id'];
  $sql = "select * from sanpham where maLoai = '$itemId'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) < 1) {
    $sql = "delete from phanloai where maLoai = '$itemId'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $response = array(
        'status' => 'success',
        'msg' => 'Xóa thành công.',
        'path' => "index.php?page=listclassify"
      );
      echo json_encode($response);
    } else {
      $response = array(
        'status' => 'error',
        'msg' => 'Xóa không thành công.',
        'path' => "index.php?page=listclassify"
      );
      echo json_encode($response);
    }
  } else {
    $response = array(
      'status' => 'error',
      'msg' => 'Xóa không thành công. Vui lòng đảm bảo không còn sản phẩm thuộc danh mục này.',
      'path' => "index.php?page=listclassify"
    );
    echo json_encode($response);
  }

} else {
  echo "Phương thức không được hỗ trợ";
}

$conn = null;