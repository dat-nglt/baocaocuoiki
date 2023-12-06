<?php
$serverName = "localhost";
$userName = "root";
$passWord = "";
$database = "laptop_z3g";

// biến kết nối csdl
$conn = mysqli_connect($serverName, $userName, $passWord, $database);

// Nếu không kết nối được cơ sở dữ liệu thì sẽ huỷ bỏ connect
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>