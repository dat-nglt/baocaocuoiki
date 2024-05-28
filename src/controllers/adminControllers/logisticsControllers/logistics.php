<?php
$_SESSION['sort__in__out'] = isset($_SESSION['sort__in__out']) ? $_SESSION['sort__in__out'] : '';
$_SESSION['sort__date'] = isset($_SESSION['sort__date']) ? $_SESSION['sort__date'] : '';
$_SESSION['sort__in__out'] = isset($_POST['sort__in__out']) ? $_POST['sort__in__out'] : $_SESSION['sort__in__out'];
$_SESSION['sort__date'] = isset($_POST['sort__date']) ? $_POST['sort__date'] : $_SESSION['sort__date'];

$total_page = ceil(mysqli_num_rows(getAllLogistics($conn, $_SESSION['sort__in__out'], $_SESSION['sort__date'])) / $limitPage);

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
$logisticsData = mysqli_fetch_all(getAllLogistics($conn, $_SESSION['sort__in__out'], $_SESSION['sort__date']));

include ('../src/views/admin/logistics/logistics.php');
