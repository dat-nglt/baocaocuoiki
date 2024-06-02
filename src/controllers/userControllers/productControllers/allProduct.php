<?php
if (isset($_POST['all-product'])) {
    $_SESSION['search-product'] = $_POST['unset-session'];
}

if (isset($_POST['search-product'])) {
    $_SESSION['search-product'] = preg_replace('/\s+/', ' ', trim($_POST['name-product']));
}
$_SESSION['search-product'] = isset($_SESSION['search-product']) ? $_SESSION['search-product'] : '';

$countProduct = getAllProduct($conn, $_SESSION['search-product'], 'desc', '0', '', '');
$limitPage = 8;
$total_page = ceil(mysqli_num_rows($countProduct) / $limitPage);
var_dump($total_page);

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
var_dump($_SESSION['search-product']);
$listClassify = getAllClassify($conn); // Lấy tất cả danh mục
$listProduct = getAllProduct($conn, $_SESSION['search-product'], 'desc', '0', $start, $limitPage);
$arrayProductFlashSaleSold = array();
foreach ($listProduct as $key => $value) {
    extract($value);
    $maSanPham1 = $maSanPham;
    $arrayProductFlashSaleSold[$maSanPham1] = mysqli_fetch_assoc(countSold($conn, $maSanPham1));
}
include ("./views/user/user-all-product.php");
?>