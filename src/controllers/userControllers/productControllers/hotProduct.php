<?php
$listClassify = getAllClassify($conn);
$listProduct = mysqli_fetch_all(countSoldAllProduct($conn));
include("./views/user/user-hot-product.php");
?>