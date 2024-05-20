<?php 
if(isset($_POST['all-product'])){
    $_SESSION['search-product'] = $_POST['unset-session'];
}

 if(isset($_POST['search-product'])){
    $_SESSION['search-product'] = $_POST['name-product'];
}
$_SESSION['search-product'] = isset($_SESSION['search-product']) ? $_SESSION['search-product']: '';
$listClassify = getAllClassify($conn); // Lấy tất cả danh mục
$listProduct = getAllProduct($conn, $_SESSION['search-product'], 'desc', '0', 0, 8);
$arrayProductFlashSaleSold = array();
foreach ($listProduct as $key => $value) {
    extract($value);
    $maSanPham1 = $maSanPham;
    $arrayProductFlashSaleSold[$maSanPham1] = mysqli_fetch_assoc(countSold($conn,$maSanPham1));
}
include("./views/user/user-all-product.php");
?>