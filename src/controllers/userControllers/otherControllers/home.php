<?php
if (!isset($_SESSION['test'])) {
    $_SESSION['test'] = '0';
}
if ($_SESSION['test'] == 1) {
    echo "</script>";
    echo "<script src='./js/message-frame.js'>";
    echo "</script>";
}
$_SESSION["test"] = 0;
$listClassify = getAllClassify($conn);
$arrayProductFlashSale = array();
$arrayProductFlashSaleSold = array();
$arrayProductFlashSaleTime = array();
$listProductFlashSale = getProductFlashSale($conn, '');
$listProductHot = countSoldAllProduct($conn);
$listProductHotSold = array();


foreach ($listProductFlashSale as $key => $value) {
    extract($value);
    if ((strtotime($ngayHetHanGiam) > strtotime(date('Y-m-d'))) && $giaGiam > 0) {
        $maSanPham1 = $maSanPham;
        $arrayProductFlashSaleSold[$maSanPham1] = mysqli_fetch_assoc(countSold($conn,$maSanPham1));
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

foreach ($listProductHot as $key => $value) {
    extract($value);
    $maSanPham1 = $maSanPham;
    $listProductHotSold[$maSanPham1] = mysqli_fetch_assoc(countSold($conn,$maSanPham1));
}

$listProduct = getAllProduct($conn, '', '', '0', '0', '10');
foreach ($listProduct as $key => $value) {
    extract($value);
    $maSanPham1 = $maSanPham;
    $arrayProductFlashSaleSold[$maSanPham1] = mysqli_fetch_assoc(countSold($conn,$maSanPham1));
}
$dataBanner = mysqli_fetch_all(getAllBanner($conn));
include("./views/user/user-homepage.php");