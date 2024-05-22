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
    $sql = "select * from nguoidung where maNguoiDung = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        $quyenTruyCap = mysqli_fetch_assoc($result)['quyenTruyCap'];
        if($quyenTruyCap === '1'){
            $lock = '0';
        }else{
            $lock = '1';
        }
        $sql = "update nguoidung set quyenTruyCap = $lock where maNguoiDung = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            if($lock === '0'){
                $response = array(
                    'status' => 'success',
                    'msg' => 'Khóa tài khoản thành công.',
                    'path' => "index.php?page=listaccounts"
                );
                echo json_encode($response);
            }else{
                $response = array(
                    'status' => 'success',
                    'msg' => 'Mở khóa tài khoản thành công.',
                    'path' => "index.php?page=listaccounts"
                );
                echo json_encode($response);
            }
        } else {
        $response = array(
            'status' => 'error',
            'msg' => 'Thay đổi trạng thái không thành công.',
            'path' => "index.php?page=listaccounts"
        );
        echo json_encode($response);
        }
    }
    

} else {
  echo "Phương thức không được hỗ trợ.";
}

$conn = null;