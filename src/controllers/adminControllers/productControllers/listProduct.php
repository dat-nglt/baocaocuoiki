<?php

if (isset($_POST['search-product'])) {
    $_SESSION['search-product'] = $_POST['search-product'];
}
if (isset($_POST['sort-product'])) {
    $_SESSION['sort-product'] = $_POST['sort-product'];
}
if (isset($_POST['sort-classify-product'])) {
    $_SESSION['sort-classify-product'] = $_POST['sort-classify-product'];
}

$_SESSION['search-product'] = isset($_SESSION['search-product']) ? $_SESSION['search-product'] : '';
$_SESSION['sort-product'] = isset($_SESSION['sort-product']) ? $_SESSION['sort-product'] : 'desc';
$_SESSION['sort-classify-product'] = isset($_SESSION['sort-classify-product']) ? $_SESSION['sort-classify-product'] : '0';

$countProduct = getAllProduct($conn, $_SESSION['search-product'], $_SESSION['sort-product'],$_SESSION['sort-classify-product'], '', '');
$total_page = ceil(mysqli_num_rows($countProduct) / $limitPage);

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
$listNameClassify = getNameClassify($conn);
$start = ($current_page - 1) * $limitPage;
$dataProduct = getAllproduct($conn, $_SESSION['search-product'], $_SESSION['sort-product'],$_SESSION['sort-classify-product'], $start, $limitPage);
include('../src/views/admin/product/product.php');