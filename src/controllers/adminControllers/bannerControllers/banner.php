<?php


$dataProduct = getAllproduct($conn, '', 'desc','0', '', '');
$dataClassify = getNameClassify($conn);
include('../src/views/admin/banner.php');

?>