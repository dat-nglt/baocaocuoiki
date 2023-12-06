<?php
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $idProduct = $_GET['id'];
    $detailProduct = mysqli_fetch_assoc(getOneProduct($conn, $idProduct));
    if (isset($_POST['addtocart'])) { 
        $nameProduct = $_POST['tensanpham'];
        $imgProduct = $_POST['hinhanh'];
        $priceProduct = $_POST['giasanpham'];
        $quantityProduct = 1;
        $thanhTien = $quantityProduct * $priceProduct;
        $checkProduct = false;
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value[0] == $idProduct) {
                $_SESSION['cart'][$key][3] += 1;
                $_SESSION['cart'][$key][5] += $thanhTien;
                $checkProduct = true;
                updateQuantityProduct($conn,1,$idProduct);
            }
        }
        if (!$checkProduct){
            $addcart = [$idProduct, $nameProduct, $imgProduct, $quantityProduct, $priceProduct, $thanhTien];
            array_push($_SESSION['cart'],$addcart);
            updateQuantityProduct($conn,1,$idProduct);
        }
    }
}
include("./views/user/detail-product.php");
?>