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
  $resultData = mysqli_query($conn, $sql);
  return $resultData;
}
