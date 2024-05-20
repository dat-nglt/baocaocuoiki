<?php
$listClassify = getAllClassify($conn);
$listProduct = getProductFlashSale($conn, '');
$arrayProductFlashSaleSold = array();
$arrayProductFlashSale = array();
foreach ($listProduct as $key => $value) {
    extract($value);
    if (strtotime($ngayHetHanGiam) > strtotime(date('Y-m-d'))) {
        $maSanPham1 = $maSanPham;
        $arrayProductFlashSaleSold[$maSanPham1] = mysqli_fetch_assoc(countSold($conn,$maSanPham1));
        $arrayProductFlashSale[$maSanPham1] = mysqli_fetch_assoc(getOneProduct($conn, $maSanPham1));
    }
}

include("./views/user/user-flash-sale.php");
?>