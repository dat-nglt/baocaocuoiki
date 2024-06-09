<?php
if (isset($_POST['all-product'])) {
    $_SESSION['search-product'] = $_POST['unset-session'];
}

if (isset($_POST['search-product'])) {
    $_SESSION['search-product'] = preg_replace('/\s+/', ' ', trim($_POST['name-product']));
}
$_SESSION['search-product'] = isset($_SESSION['search-product']) ? $_SESSION['search-product'] : '';

$countProduct = getAllProduct($conn, $_SESSION['search-product'], '', '0', '', '');
$limitPage = 8;
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

$start = ($current_page - 1) * $limitPage;
$listClassify = getAllClassify($conn);
$listProduct = getAllProductHome($conn, $_SESSION['search-product'], $start, $limitPage);

include ("./views/user/user-all-product.php");
?>