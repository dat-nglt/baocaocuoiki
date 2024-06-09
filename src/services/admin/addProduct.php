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
  $price = preg_replace('/\s+/', '', trim($_POST['price']));
  $brand = $_POST['brand'];
  $des = $_POST['des'];

  if($name === ''){
    $response = array(
      'status' => 'warning',
      'msg' => 'Tên sản phẩm không được bỏ trống',
      'path' => "index.php?page=listproducts"
    );
    echo json_encode($response);
    return;
  }

  if($brand === ''){
    $response = array(
      'status' => 'warning',
      'msg' => 'Vui lòng thêm thương hiệu',
      'path' => "index.php?page=listproducts"
    );
    echo json_encode($response);
    return;
  }

  if (!is_numeric($price)) {
    $response = array(
      'status' => 'warning',
      'msg' => 'Giá sản phẩm phải là số',
      'path' => "index.php?page=listproducts"
    );
    echo json_encode($response);
    return;
  }

  if(isset($_POST['image'])){
    $image = $_POST['image'];
  }else{
    $image = '';
  }
  $sql = "select * from sanpham where tenSanPham = '$name'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) < 1) {
    $sql = "INSERT INTO sanpham VALUES ('', '$name', '$image', '$price', '0', '$des', '', DATE(NOW()), '$brand')";
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
    if(mysqli_fetch_assoc($result)['maLoai'] !== $brand){
      $sql = "INSERT INTO sanpham VALUES ('', '$name', '$image', '$price', '0', '$des', '', DATE(NOW()), '$brand')";
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
    }else{
      $response = array(
        'status' => 'error',
        'msg' => 'Tên sản phẩm đã tồn tại',
        'path' => "index.php?page=listproducts"
      );
      echo json_encode($response);
    }
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