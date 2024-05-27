<?php
if (isset($_POST['search-order'])) {
    $_SESSION['search-order'] = $_POST['search-order'];
}
if (isset($_POST['sort-order'])) {
    $_SESSION['sort-order'] = $_POST['sort-order'];
}

$_SESSION['search-order'] = isset($_SESSION['search-order']) ? $_SESSION['search-order'] : '';
$_SESSION['sort-order'] = isset($_SESSION['sort-order']) ? $_SESSION['sort-order'] : 'desc';

$countOrder = getAll_Order($conn, $_SESSION['search-order'], $_SESSION['sort-order'], '', '');
$total_page = ceil(mysqli_num_rows($countOrder) / $limitPage);

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
$dataOrder = getAll_Order($conn, $_SESSION['search-order'], $_SESSION['sort-order'], $start, $limitPage);
include('../src/views/admin/bill/list-bill.php');
