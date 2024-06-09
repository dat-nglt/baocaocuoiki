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
  $name = preg_replace('/\s+/', ' ', trim($_POST['name']));
  $price = preg_replace('/\s+/', '', trim($_POST['price']));
  $category = $_POST['category'];
  $sale = preg_replace('/\s+/', '', trim($_POST['number']));
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $des = $_POST['des'];
  $image = $_POST['image'];

  if ($name === '') {
    $response = array(
      'status' => 'warning',
      'msg' => 'Tên sản phẩm không được bỏ trống',
      'path' => "index.php?page=listproducts"
    );
    echo json_encode($response);
    return;
  }

  if ($category === '') {
    $response = array(
      'status' => 'warning',
      'msg' => 'Vui lòng nhập thêm thương hiệu',
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

  if (!is_numeric($sale)) {
    $response = array(
      'status' => 'warning',
      'msg' => 'Giá sản phẩm phải là số',
      'path' => "index.php?page=listproducts"
    );
    echo json_encode($response);
    return;
  }

  if ($sale < 0 || $sale > 99) {
    $response = array(
      'status' => 'warning',
      'msg' => 'Giá sản phẩm phải nằm trong khoảng từ 0 đến 99',
      'path' => "index.php?page=listproducts"
    );
    echo json_encode($response);
    return;
  }

  $sql = "select * from sanpham where maSanPham = '$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if ($row['tenSanPham'] === $name) {
    if ($row['maLoai'] === $category) {
      $sql = "UPDATE sanpham SET tenSanPham = '$name', hinhAnh = '$image', giaTien = '$price', giaGiam = '$sale', ngayBatDau = '$startDate', ngayHetHanGiam = '$endDate', moTa = '$des', maLoai = '$category' WHERE maSanPham = '$id'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $sql = "select * from lichsugiam where maSanPham = '$id' and trangThai = 'Đang diễn ra'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) < 1){
          $sql = "insert into lichsugiam values ('', '$id' , '$startDate' ,'$endDate', 'Đang diễn ra')";
          $result = mysqli_query($conn, $sql);
          if(!$result){
            $response = array(
              'status' => 'error',
              'msg' => 'Thêm lịch sử giảm giá không thành công',
              'path' => "index.php?page=listproducts"
            );
            echo json_encode($response);
          }
          $response = array(
            'status' => 'success',
            'msg' => 'Chỉnh sửa sản phẩm thành công',
            'path' => "index.php?page=listproducts"
          );
          echo json_encode($response);
        }else{
          $date = date('Y-m-d');
          if($endDate < $date){
            $sql = "UPDATE lichsugiam SET ngayKetThuc = '$date', trangThai = 'Đã kết thúc' WHERE maSanPham = '$id' and trangThai = 'Đang diễn ra'";
            $result = mysqli_query($conn, $sql);
            if(!$result){
              $response = array(
                'status' => 'error',
                'msg' => 'Cập nhật lịch sử giảm giá không thành công',
                'path' => "index.php?page=listproducts"
              );
              echo json_encode($response);
            }
            $response = array(
              'status' => 'success',
              'msg' => 'Chỉnh sửa sản phẩm thành công',
              'path' => "index.php?page=listproducts"
            );
            echo json_encode($response);
          }else{
            if($row['giaGiam'] !== $sale){
              $sql = "UPDATE lichsugiam SET ngayKetThuc = '$date', trangThai = 'Đã kết thúc' WHERE maSanPham = '$id' and trangThai = 'Đang diễn ra'";
                $result = mysqli_query($conn, $sql);
                if($result){
                  $sql = "insert into lichsugiam values ('', '$id' , '$startDate' ,'$endDate', 'Đang diễn ra')";
                  $result = mysqli_query($conn, $sql);
                  if(!$result){
                    $response = array(
                      'status' => 'error',
                      'msg' => 'Thêm lịch sử giảm giá không thành công',
                      'path' => "index.php?page=listproducts"
                    );
                    echo json_encode($response);
                  }
                  $response = array(
                    'status' => 'success',
                    'msg' => 'Cập nhật lịch sử giảm giá thành công',
                    'path' => "index.php?page=listproducts"
                  );
                  echo json_encode($response);
                }
            }else{
              $sql = "UPDATE lichsugiam SET ngayKetThuc = '$endDate' WHERE maSanPham = '$id' and trangThai = 'Đang diễn ra'";
              $result = mysqli_query($conn, $sql);
              if(!$result){
                $response = array(
                  'status' => 'error',
                  'msg' => 'Cập nhật lịch sử giảm giá không thành công',
                  'path' => "index.php?page=listproducts"
                );
                echo json_encode($response);
              }
              $response = array(
                'status' => 'success',
                'msg' => 'Chỉnh sửa sản phẩm thành công',
                'path' => "index.php?page=listproducts"
              );
              echo json_encode($response);
            }
          }
        }
      
      } else {
        $response = array(
          'status' => 'error',
          'msg' => 'Chỉnh sửa sản phẩm không thành công',
          'path' => "index.php?page=listproducts"
        );
        echo json_encode($response);
      }
    } else {
      $sql = "select * from sanpham where maLoai = '$category' AND tenSanPham = '$name'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        $response = array(
          'status' => 'error',
          'msg' => 'Tên sản phẩm đã tồn tại',
          'path' => "index.php?page=listproducts"
        );
        echo json_encode($response);
      } else {
        $sql = "UPDATE sanpham SET tenSanPham = '$name', hinhAnh = '$image', giaTien = '$price', giaGiam = '$sale', ngayHetHanGiam = '$dateSale', moTa = '$des', maLoai = '$category' WHERE maSanPham = '$id'";
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
    $sql = "select * from sanpham where maLoai = '$category' AND tenSanPham = '$name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $response = array(
        'status' => 'error',
        'msg' => 'Tên sản phẩm đã tồn tại',
        'path' => "index.php?page=listproducts"
      );
      echo json_encode($response);
    } else {
      $sql = "UPDATE sanpham SET tenSanPham = '$name', hinhAnh = '$image', giaTien = '$price', giaGiam = '$sale', ngayHetHanGiam = '$dateSale', moTa = '$des', maLoai = '$category' WHERE maSanPham = '$id'";
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