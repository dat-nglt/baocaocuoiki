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
        }
    }
    if (!$checkProduct) {
        $addcart = [$idProduct, $nameProduct, $imgProduct, $quantityProduct, $priceProduct, $thanhTien];
        array_push($_SESSION['cart'], $addcart);

    }
    responseMessage1('Thêm vào giỏ hàng thành công', 'index.php?page=details-product&id=' . $idProduct, count($_SESSION['cart']));
}