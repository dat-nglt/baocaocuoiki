<?php
$dataBanner = mysqli_fetch_all(getAllBanner($conn));
$dataProduct = getAllproduct($conn, '', 'desc', '0', '', '');
$dataClassify = getNameClassify($conn);
include ('../src/views/admin/banner.php');
?>