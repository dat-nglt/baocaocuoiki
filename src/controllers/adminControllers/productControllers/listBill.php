<?php
if (isset($_POST['search-submit-order'])) {
    $_SESSION['search-order'] = $_POST['search-input-order'];
}
if (isset($_POST['sort-submit-order'])) {
    $_SESSION['sort-order'] = $_POST['sort-select-order'];
}

/* Lấy ra giá trị từ bộ lọc đưa vào cho biến session */
$_SESSION['search-order'] = isset($_SESSION['search-order']) ? $_SESSION['search-order'] : '';
$_SESSION['sort-order'] = isset($_SESSION['sort-order']) ? $_SESSION['sort-order'] : 'desc';

if (isset($_POST['del-order'])) {

    delOne_Order($conn, $_POST['idOrder']);
}

// Lấy ra số trong trên url
$countOrder = getAll_Order($conn, $_SESSION['search-order'], $_SESSION['sort-order'], '', ''); //Lấy ra tổng số dòng có trong CSDL
$total_page = ceil(mysqli_num_rows($countOrder) / $limitPage); // Tính tổng số trang cần có để hiển thị hết các dòng, mỗi trang 5 dòng dữ liệu
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
$dataOrder = getAll_Order($conn, $_SESSION['search-order'], $_SESSION['sort-order'], $start, $limitPage); //Lấy dữ liệu từ vị trí của start với số dòng dữ liệu là limitPage
include('../src/views/admin/bill/list-bill.php');
?>