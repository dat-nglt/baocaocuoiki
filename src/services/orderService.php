<?php
include ("./serviceAjax.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idProduct = $_POST['maSanPham'];
  $nameProduct = $_POST['tenSanPham'];
  $imgProduct = $_POST['hinhAnh'];
  $priceProduct = $_POST['giaTien'];
}