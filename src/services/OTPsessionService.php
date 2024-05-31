<?php
$serverName = "localhost";
$userName = "root";
$passWord = "";
$database = "laptop_z3g";
session_start();
$conn = mysqli_connect($serverName, $userName, $passWord, $database);
function responseMessage($status, $msg, $path)
{
  $response = array(
    'status' => $status,
    'msg' => $msg,
    'path' => $path
  );
  echo json_encode($response);
}

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['sessionOTP'] = isset($_POST['sessionOTP']) ? $_POST['sessionOTP'] : null;
  responseMessage('warning', $_SESSION['sessionOTP'], '');
}
