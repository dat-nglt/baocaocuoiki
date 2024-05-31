<?php


function logisticsChart($conn, $time)
{
  $sql = "SELECT logistics.statusLogistics, SUM(quantityLogistics)
  FROM logistics
  WHERE DATE(logistics.timeLogistics) BETWEEN DATE_SUB(CURDATE(), INTERVAL $time DAY) AND CURDATE()
  GROUP BY logistics.statusLogistics;";
  $resultData = mysqli_query($conn, $sql);
  return $resultData;
}

function billChart($conn, $time)
{
  $sql = "SELECT COUNT(*), donhang.thoiGian 
  FROM `donhang` WHERE DATE(donhang.thoiGian) 
  BETWEEN DATE_SUB(CURDATE(), INTERVAL $time DAY) AND CURDATE()
  GROUP BY donhang.thoiGian;";
  if ($time > 30) {
    $sql = "SELECT
    COUNT(*) AS total,
    DATE_FORMAT(donhang.thoiGian, '%Y-%m') AS thang
    FROM donhang
    WHERE WHERE DATE(donhang.thoiGian) BETWEEN DATE_SUB(CURDATE(), INTERVAL 60 DAY) AND CURDATE()
    GROUP BY thang;";
  }
  $resultData = mysqli_query($conn, $sql);
  return $resultData;
}

function getMinusProductQuantity($conn, $time)
{
  $sql = "SELECT COUNT(*), DATE_FORMAT(logistics.timeLogistics, '%Y-%m') AS thang 
  FROM logistics 
  WHERE DATE(logistics.timeLogistics) 
  BETWEEN DATE_SUB(CURDATE(), INTERVAL 60 DAY) 
  AND CURDATE() AND logistics.statusLogistics = 0 
  GROUP BY thang;";
  $resultData = mysqli_query($conn, $sql);
  return $resultData;
}


function getAdditionProductQuantity($conn, $time)
{
  $sql = "SELECT COUNT(*), DATE_FORMAT(logistics.timeLogistics, '%Y-%m') AS thang 
  FROM logistics 
  WHERE DATE(logistics.timeLogistics) 
  BETWEEN DATE_SUB(CURDATE(), INTERVAL 60 DAY) 
  AND CURDATE() AND logistics.statusLogistics = 1 
  GROUP BY thang;";
  $resultData = mysqli_query($conn, $sql);
  return $resultData;
}
