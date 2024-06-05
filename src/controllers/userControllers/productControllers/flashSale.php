<?php
$listClassify = getAllClassify($conn);
$arrayProductFlashSaleSold = array();
$arrayProductFlashSale = array();
$arrayProductFlashSaleTime = array();

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
$sql = "SELECT * FROM sanpham WHERE giaGiam > 0 AND (DATE(NOW()) < ngayHetHanGiam) LIMIT $start, 8";
$listProduct = mysqli_query($conn, $sql);
foreach ($listProduct as $key => $value) {
    extract($value);
    if ((strtotime($ngayHetHanGiam) > strtotime(date('Y-m-d'))) && $giaGiam > 0) {
        $maSanPham1 = $maSanPham;
        $arrayProductFlashSaleSold[$maSanPham1] = mysqli_fetch_assoc(countSold($conn, $maSanPham1));
        $arrayProductFlashSale[$maSanPham1] = mysqli_fetch_assoc(getOneProduct($conn, $maSanPham1));
        $currentDateTime = new DateTime();
        $currentTimestamp = $currentDateTime->getTimestamp();
        $time = $arrayProductFlashSale[$maSanPham1]['ngayHetHanGiam'];
        $targetDateTime = new DateTime("".$time." 24:00:00");
        $targetTimestamp = $targetDateTime->getTimestamp();
        $secondsRemaining = $targetTimestamp - $currentTimestamp;
        $arrayProductFlashSaleTime[$maSanPham1] = formatTimeRemaining($secondsRemaining);
    }
}

include ("./views/user/user-flash-sale.php");