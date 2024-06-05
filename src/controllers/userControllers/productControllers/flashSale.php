<?php
$listClassify = getAllClassify($conn);
$arrayProductFlashSaleSold = array();
$arrayProductFlashSale = array();

$total_page = ceil(mysqli_num_rows(getProductFlashSale($conn)) / 8);

if ($total_page == 0) {
    $total_page = 1;
}
$current_page = isset($_GET['pageNumber']) ? $_GET['pageNumber'] : '1';
if ($current_page < 1) {
    $current_page = 1;
}
if ($current_page > $total_page) {
    $current_page = $total_page;
}
$start = ($current_page - 1) * 8;
$listProduct = getProductFlashSale($conn, $start, 8);

foreach ($listProduct as $key => $value) {
    extract($value);
    if (strtotime($ngayHetHanGiam) > strtotime(date('Y-m-d'))) {
        $maSanPham1 = $maSanPham;
        $arrayProductFlashSaleSold[$maSanPham1] = mysqli_fetch_assoc(countSold($conn, $maSanPham1));
        $arrayProductFlashSale[$maSanPham1] = mysqli_fetch_assoc(getOneProduct($conn, $maSanPham1));
    }
}

include ("./views/user/user-flash-sale.php");