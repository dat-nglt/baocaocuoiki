<?php

if (isset($_POST['search-submit-product'])) {
    $_SESSION['search-product'] = $_POST['search-input-product'];
}
if (isset($_POST['sort-submit-product'])) {
    $_SESSION['sort-product'] = $_POST['sort-select-product'];
}
if (isset($_POST['sort-submit-classify-product'])) {
    $_SESSION['sort-classify-product'] = $_POST['sort-select-classify-product'];
}
/* Lấy ra giá trị từ bộ lọc đưa vào cho biến session */
$_SESSION['search-product'] = isset($_SESSION['search-product']) ? $_SESSION['search-product'] : '';
$_SESSION['sort-product'] = isset($_SESSION['sort-product']) ? $_SESSION['sort-product'] : 'desc';
$_SESSION['sort-classify-product'] = isset($_SESSION['sort-classify-product']) ? $_SESSION['sort-classify-product'] : '0';
// Lấy ra số trong trên url
$countProduct = getAllProduct($conn, $_SESSION['search-product'], $_SESSION['sort-product'],$_SESSION['sort-classify-product'], '', ''); //Lấy ra tổng số dòng có trong CSDL
$total_page = ceil(mysqli_num_rows($countProduct) / $limitPage); // Tính tổng số trang cần có để hiển thị hết các dòng, mỗi trang 5 dòng dữ liệu
// 
if ($total_page == 0) { //Kiểm tra trường hợp không có bất cứ hàng dữ liệu nào trong điều kiện query => 1 
    $total_page = 1;
}
$current_page = isset($_GET['pageNumber']) ? $_GET['pageNumber'] : '1';
if ($current_page < 1) { //Kiểm tra nếu người dùng nhập số lượng page trên url có giá trị nhỏ hơn trang đầu tiền
    $current_page = 1;
}
if ($current_page > $total_page) { //Kiểm tra nếu người dùng nhập số lượng page trên url có giá trị lớn hơn trang cuối cùng
    $current_page = $total_page;
}
$listNameClassify = getNameClassify($conn);
$start = ($current_page - 1) * $limitPage; // Tính vị trí bắt đầu cho dữ liệu
$dataProduct = getAllproduct($conn, $_SESSION['search-product'], $_SESSION['sort-product'],$_SESSION['sort-classify-product'], $start, $limitPage); //Lấy dữ liệu từ vị trí của start với số dòng dữ liệu là limitPage
include('../src/views/admin/product/list-product.php');
?>