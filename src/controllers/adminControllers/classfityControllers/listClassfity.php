<?php
if (isset($_POST['search-classify'])) {
    $_SESSION['search-classify'] = preg_replace('/\s+/', ' ', trim($_POST['search-classify']));
}
if (isset($_POST['sort-classify'])) {
    $_SESSION['sort-classify'] = $_POST['sort-classify'];
}

$_SESSION['search-classify'] = isset($_SESSION['search-classify']) ? $_SESSION['search-classify'] : '';
$_SESSION['sort-classify'] = isset($_SESSION['sort-classify']) ? $_SESSION['sort-classify'] : 'desc';

$countClassify = getNameClassifyAdmin($conn,$_SESSION['search-classify']);
$total_page = ceil(mysqli_num_rows($countClassify) / $limitPage);

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
$dataClassify = getAllClassifyAdmin($conn, $_SESSION['search-classify'], $_SESSION['sort-classify'], $start, $limitPage);
$classifyCount = array();
foreach ($dataClassify as $Classify) {
    $ClassifyCount[$Classify['maLoai']] = mysqli_fetch_assoc(getCountProductWithClassify($conn, $Classify['maLoai']));
}
include ('../src/views/admin/classify/list-classify.php');