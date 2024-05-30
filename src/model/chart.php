<?php

function chart($statusLogistics, $time)
{
  $sql = "SELECT product.nameProduct, SUM(quantityLogistics)
  FROM logistics
  JOIN product ON logistics.idProduct = product.id
  WHERE statusLogistics = '$statusLogistics'
  AND DATE(logistics.time) BETWEEN DATE_SUB(CURDATE(), INTERVAL $time DAY) AND CURDATE()
  GROUP BY product.nameProduct;";

  $query = $this->_query($sql);
  return $query;
}