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
  FROM donhang WHERE DATE(donhang.thoiGian) 
  BETWEEN DATE_SUB(CURDATE(), INTERVAL $time DAY) AND CURDATE()
  GROUP BY donhang.thoiGian;";
  if ($time > 30) {
    $sql = "SELECT
    COUNT(*) AS total,
    DATE_FORMAT(donhang.thoiGian, '%Y-%m') AS thang
    FROM donhang
    WHERE DATE(donhang.thoiGian) BETWEEN DATE_SUB(CURDATE(), INTERVAL $time DAY) AND CURDATE()
    GROUP BY thang;";
  }
  $resultData = mysqli_query($conn, $sql);
  return $resultData;
}

function getLogisticsQuantity($conn, $time, $status)
{
  $sql = "SELECT SUM(logistics.quantityLogistics), DATE_FORMAT(logistics.timeLogistics, '%Y-%m-%d') AS dateLogistics
	FROM logistics
  WHERE DATE(logistics.timeLogistics) 
  BETWEEN DATE_SUB(CURDATE(), INTERVAL $time DAY) 
  AND CURDATE() AND logistics.statusLogistics = $status
  GROUP BY dateLogistics
  ";
  if ($time > 30) {
    $sql = "SELECT SUM(logistics.quantityLogistics), DATE_FORMAT(logistics.timeLogistics, '%Y-%m') AS monthLogistics 
    FROM logistics 
    WHERE DATE(logistics.timeLogistics) 
    BETWEEN DATE_SUB(CURDATE(), INTERVAL $time DAY) 
    AND CURDATE() AND logistics.statusLogistics = $status 
    GROUP BY monthLogistics;";
  }
  $resultData = mysqli_query($conn, $sql);
  return $resultData;
}

function salesLogistics($conn, $time)
{
  $sql = "SELECT SUM(donhang.thanhTien), donhang.thoiGian, donhang.trangThai 
  FROM donhang 
  WHERE donhang.trangThai = 3 
  AND DATE(donhang.thoiGian) 
  BETWEEN DATE_SUB(CURDATE(), INTERVAL $time DAY) AND CURDATE()
  GROUP BY donhang.thoiGian";
  if ($time > 30) {
    $sql = "SELECT SUM(donhang.thanhTien),  DATE_FORMAT(donhang.thoiGian, '%Y-%m') AS monthLogistics, donhang.thoiGian, donhang.trangThai 
    FROM donhang 
    WHERE donhang.trangThai = 0 
    AND DATE(donhang.thoiGian) 
    BETWEEN DATE_SUB(CURDATE(), INTERVAL $time DAY) AND CURDATE()
    GROUP BY monthLogistics;";
  }

  $resultData = mysqli_query($conn, $sql);
  return $resultData;
}

