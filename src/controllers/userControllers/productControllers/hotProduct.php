<?php
$listClassify = getAllClassify($conn);

$total_page = ceil(mysqli_num_rows(countSoldAllProduct($conn)) / 8);

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
$listProduct = countSoldAllProduct($conn, $start, 8);
include ("./views/user/user-hot-product.php");