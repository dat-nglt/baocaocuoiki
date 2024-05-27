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
  $count = $_POST['count'];
  $category = $_POST['category'];
  $sale = $_POST['sale'];
  $dateSale = $_POST['dateSale'];
  $des = $_POST['des'];
  $image = $_POST['image'];

  if ($count < 0) {
    $count = 0;
  }
  $sql = "select * from sanpham where maSanPham = '$id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_fetch_assoc($result)['tenSanPham'] === $name) {
    $sql = "UPDATE sanpham SET tenSanPham = '$name', soLuong = '$count', hinhAnh = '$image', giaGiam = '$sale', ngayHetHanGiam = '$dateSale', moTa = '$des', maLoai = '$category' WHERE maSanPham = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $response = array(
        'status' => 'success',
        'msg' => 'Chỉnh sửa sản phẩm thành công',
        'path' => "index.php?page=listproducts"
      );
      echo json_encode($response);
    } else {
      $response = array(
        'status' => 'error',
        'msg' => 'Chỉnh sửa sản phẩm không thành công',
        'path' => "index.php?page=listproducts"
      );
      echo json_encode($response);
    }
  } else {
    $sql = "select * from sanpham where tenSanPham = '$name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $response = array(
        'status' => 'error',
        'msg' => 'Tên sản phẩm đã tồn tại',
        'path' => "index.php?page=listproducts"
      );
      echo json_encode($response);
    } else {
      $sql = "UPDATE sanpham SET tenSanPham = '$name', soLuong = '$count', hinhAnh = '$image', giaGiam = '$sale', ngayHetHanGiam = '$dateSale', moTa = '$des', maLoai = '$category' WHERE maSanPham = '$id'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $response = array(
          'status' => 'success',
          'msg' => 'Chỉnh sửa sản phẩm thành công',
          'path' => "index.php?page=listproducts"
        );
        echo json_encode($response);
      } else {
        $response = array(
          'status' => 'error',
          'msg' => 'Chỉnh sửa sản phẩm không thành công',
          'path' => "index.php?page=listproducts"
        );
        echo json_encode($response);
      }
    }

  }

} else {
  $response = array(
    'status' => 'error',
    'msg' => 'Lỗi không thể cập nhật dữ liệu',
    'path' => "index.php?page=listproducts"
  );
  echo json_encode($response);
}

$conn = null;