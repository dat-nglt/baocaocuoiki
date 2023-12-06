<?php
if (isset($_POST['search-submit-account'])) {
    $_SESSION['search-account'] = $_POST['search-input-account'];
}
if (isset($_POST['sort-submit-account'])) {
    $_SESSION['sort-account'] = $_POST['sort-select-account'];
}
/* Lấy ra giá trị từ bộ lọc đưa vào cho biến session */
$_SESSION['search-account'] = isset($_SESSION['search-account']) ? $_SESSION['search-account'] : '';
$_SESSION['sort-account'] = isset($_SESSION['sort-account']) ? $_SESSION['sort-account'] : 'desc';
// Lấy ra số trong trên url
$countAccount = getAllAccount($conn, $_SESSION['search-account'], $_SESSION['sort-account'], '', ''); //Lấy ra tổng số dòng có trong CSDL
$total_page = ceil(mysqli_num_rows($countAccount) / $limitPage); // Tính tổng số trang cần có để hiển thị hết các dòng, mỗi trang 5 dòng dữ liệu
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

$start = ($current_page - 1) * $limitPage; // Tính vị trí bắt đầu cho dữ liệu
$dataAccount = getAllAccount($conn, $_SESSION['search-account'], $_SESSION['sort-account'], $start, $limitPage); //Lấy dữ liệu từ vị trí của start với số dòng dữ liệu là limitPage
include('../src/views/admin/account/list-account.php');
?>