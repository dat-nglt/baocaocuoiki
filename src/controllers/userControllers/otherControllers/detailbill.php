<?php
if(isset($_GET['id'])&&$_GET['id']>0){
    $detailBill = mysqli_fetch_assoc(getOneOrder($conn, $_GET['id']));
    $listProductBill = mysqli_fetch_all(getDetailOrder($conn, $_GET['id']));
    $product = array();
    foreach ($listProductBill as $key => $value) {
        extract($value);
        $product[$value[2]] = mysqli_fetch_assoc(getOneProduct($conn, $value[2]));
    }
    include("./views/user/user-detail-bill-history.php");
}else{
    header("Location: index.php");
    exit();
}
?>