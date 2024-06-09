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
$listProductFlashSale = getProductFlashSale($conn, '');
$listProductHot = countSoldAllProduct($conn);
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

$listProduct = getAllProductHome($conn,'','0', '10');
$dataBanner = mysqli_fetch_all(getAllBanner($conn));
include("./views/user/user-homepage.php");