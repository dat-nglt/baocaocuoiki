<?php
$serverName = "localhost";
$userName = "root";
$passWord = "";
$database = "laptop_z3g";
session_start();
$conn = mysqli_connect($serverName, $userName, $passWord, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$_SESSION['productID'] = 1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $listDataLogistics = $_POST['listDataLogistics'];
  if (!empty($listDataLogistics)) {
    try {
      foreach ($listDataLogistics as $item) {
        $sqlCheckQuantity = "SELECT sanpham.soLuong 
        FROM sanpham 
        WHERE sanpham.maSanPham = '12';";
        $quantityInStock = mysqli_fetch_assoc(mysqli_query($conn, $sqlCheckQuantity));
        if ($quantityInStock["soLuong"] < $item[1] && $item[4] == '0') {
          continue;
        } else {
          $sqlLogistics = "INSERT INTO logistics
          (id, 
          idProduct, 
          quantityLogistics, 
          timeLogistics, 
          addessLogistics, 
          noteLogistics, 
          statusLogistics) 
          VALUES (NULL,
          '$item[0]', 
          '$item[1]', 
          current_timestamp(), 
          '$item[2]', 
          '$item[3]', 
          '$item[4]');";
          $result = mysqli_query($conn, $sqlLogistics);
          $quantityUpdate = $item[4] == '1' ? $item[1] : -($item[1]);
          if ($result) {
            $sqlUpdateQuantity = "UPDATE sanpham 
            SET soLuong = soLuong + ('$quantityUpdate')
            WHERE sanpham.maSanPham = 12;";
            mysqli_query($conn, $sqlUpdateQuantity);
          }
        }

      }
      $response = array(
        'status' => 'success',
        'msg' => 'Hoàn tất nhập / xuất sản phẩm',
        'path' => "index.php?page=logistics"
      );
      echo json_encode($response);
    } catch (Exception $e) {
      $response = array(
        'status' => 'warning',
        'msg' => 'Chưa hoàn tất nhập / xuất sản phẩm',
        'path' => "index.php?page=logistics"
      );
      echo json_encode($response);
    }
  }
}
