<?php
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $listClassify = getAllClassify($conn);
    $arrayProductFlashSaleSold = array();

    $total_page = ceil(mysqli_num_rows(getAllProductOfClassify($conn, $_GET['id'])) / 8);
    $listAllProduct = getAllProductOfClassify($conn, $_GET['id']);
    $nameClassify = mysqli_fetch_array($listAllProduct)[9];
    if($nameClassify === null){
        echo "<script>window.location.href = 'http://localhost/baocaocuoiki/src/';</script>";
        exit();
    }
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
    $start = ($current_page - 1) * 8;
    $listProduct = getAllProductOfClassify($conn, $_GET['id'], $start, 8);
    foreach ($listProduct as $key => $value) {
        extract($value);
        $maSanPham1 = $maSanPham;
        $arrayProductFlashSaleSold[$maSanPham1] = mysqli_fetch_assoc(countSold($conn, $maSanPham1));
    }
    include ("./views/user/category-product.php");
} else {
    header("location: index.php ");
    exit();
}
?>