<?php

function getAllLogistics($conn, $sortStatus = null, $sortTime = 'asc')
{
  $sql = "SELECT logistics.id, 
  sanpham.tenSanPham, 
  logistics.quantityLogistics, 
  logistics.timeLogistics, 
  logistics.addessLogistics, 
  logistics.noteLogistics, 
  logistics.statusLogistics FROM sanpham, 
  logistics WHERE sanpham.maSanPham = logistics.idProduct";

  if (!empty($sortStatus)) {
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