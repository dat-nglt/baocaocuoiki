<?php 
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $listClassify = getAllClassify($conn);
    $listProduct = getAllProductOfClassify($conn, $_GET['id']);
    $nameClassify = mysqli_fetch_array($listProduct)[9];
    $arrayProductFlashSaleSold = array();
foreach ($listProduct as $key => $value) {
    extract($value);
    $maSanPham1 = $maSanPham;
    $arrayProductFlashSaleSold[$maSanPham1] = mysqli_fetch_assoc(countSold($conn,$maSanPham1));
}
    include("./views/user/category-product.php");
} else {
    header("location: index.php ");
    exit();
}
?>