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

function responseMessage1($status, $msg, $data)
{
  $response = array(
    'status' => $status,
    'msg' => $msg,
    'data' => $data
  );
  echo json_encode($response);
}
