<?php
$listClassify = getAllClassify($conn);
$listProduct = countSoldAllProduct($conn);
include("./views/user/user-hot-product.php");
?>