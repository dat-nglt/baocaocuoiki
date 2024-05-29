<?php

function getAllLogistics($conn, $searchLogistics = null, $sortStatus = null, $sortTime = 'asc')
{
  $sql = "SELECT logistics.id, 
  sanpham.tenSanPham, 
  logistics.quantityLogistics, 
  logistics.timeLogistics, 
  logistics.addessLogistics, 
  logistics.noteLogistics, 
  logistics.statusLogistics FROM sanpham, 
  logistics WHERE sanpham.maSanPham = logistics.idProduct";

  if (!empty($searchLogistics)) {
    $sql .= " AND sanpham.tenSanPham LIKE '%$searchLogistics%'";
  }

  if ($sortStatus != '') {
    $sql .= " AND logistics.statusLogistics = '$sortStatus'";
  }
  ;

  $sql .= " ORDER BY logistics.timeLogistics $sortTime";

  $result = mysqli_query(
    $conn,
    $sql
  );
  return $result;
}

function getAllProductLogistics($conn)
{
  $sql = "SELECT s.tenSanPham, s.maSanPham, s.soLuong, p.tenLoai FROM sanpham AS s JOIN phanloai AS p ON s.maLoai = p.maloai where 1";
  $resultData = mysqli_query($conn, $sql);
  return $resultData;
}
;