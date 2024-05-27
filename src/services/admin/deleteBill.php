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
    $sql = "delete from donhang where maDonHang = '$itemId'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql = "delete from chitietdonhang where maDonHang = '$itemId'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            $response = array(
                'status' => 'success',
                'msg' => 'Xóa thành công.',
                'path' => "index.php?page=listbills"
            );
            echo json_encode($response);
        }
        $response = array(
            'status' => 'success',
            'msg' => 'Xóa thành công.',
            'path' => "index.php?page=listbills"
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'error',
            'msg' => 'Xóa không thành công.',
            'path' => "index.php?page=listbills"
        );
        echo json_encode($response);
    }

} else {
    echo "Phương thức không được hỗ trợ";
}

$conn = null;