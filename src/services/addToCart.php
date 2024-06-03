<?php
include ("./serviceAjax.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProduct = $_POST['maSanPham'];
    $nameProduct = $_POST['tenSanPham'];
    $imgProduct = $_POST['hinhAnh'];
    $priceProduct = $_POST['giaTien'];
    $quantityProduct = 1;
    $thanhTien = $quantityProduct * $priceProduct;
    $checkProduct = false;
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value[0] == $idProduct) {
            $_SESSION['cart'][$key][3] += 1;
            $_SESSION['cart'][$key][5] += $thanhTien;
            $checkProduct = true;
            $sql1 = "update sanpham set soLuong = soLuong - '" . $quantityProduct . "' where maSanPham = '" . $idProduct . "'";
            $updateQuantity = mysqli_query($conn, $sql1);
        }
    }
    if (!$checkProduct) {
        $addcart = [$idProduct, $nameProduct, $imgProduct, $quantityProduct, $priceProduct, $thanhTien];
        array_push($_SESSION['cart'], $addcart);
        $sql2 = "update sanpham set soLuong = soLuong - '" . $quantityProduct . "' where maSanPham = '" . $idProduct . "'";
        $updateQuantity = mysqli_query($conn, $sql2);
    }
    responseMessage('Thêm vào giỏ hàng thành công', 'index.php?page=details-product&id=' . $idProduct,'');
}