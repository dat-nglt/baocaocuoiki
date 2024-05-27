<?php
if (isset($_POST['search-account'])) {
    $_SESSION['search-account'] = $_POST['search-account'];
}
if (isset($_POST['sort-account'])) {
    $_SESSION['sort-account'] = $_POST['sort-account'];
}

$_SESSION['search-account'] = isset($_SESSION['search-account']) ? $_SESSION['search-account'] : '';
$_SESSION['sort-account'] = isset($_SESSION['sort-account']) ? $_SESSION['sort-account'] : 'desc';

$countAccount = getAllAccount($conn, $_SESSION['search-account'], $_SESSION['sort-account'], '', '');
$total_page = ceil(mysqli_num_rows($countAccount) / $limitPage);
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
$dataAccount = getAllAccount($conn, $_SESSION['search-account'], $_SESSION['sort-account'], $start, $limitPage);
include ('../src/views/admin/account/account.php');
