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
$listProductFlashSale = getProductFlashSale($conn, $start, 8);
$arrayProductFlashSaleTime = array();
foreach ($listProductFlashSale as $key => $value) {
        $currentDateTime = new DateTime();
        $currentTimestamp = $currentDateTime->getTimestamp();
        $time = $value['ngayHetHanGiam'];
        $targetDateTime = new DateTime("".$time." 24:00:00");
        $targetTimestamp = $targetDateTime->getTimestamp();
        $secondsRemaining = $targetTimestamp - $currentTimestamp;
        $arrayProductFlashSaleTime[$value['maSanPham']] = formatTimeRemaining($secondsRemaining);
}

include ("./views/user/user-flash-sale.php");