<?php
if(isset($_SESSION['succes']) && $_SESSION['succes']){
    $_SESSION['succes'] = false;
    include("./views/user/success-order.php");
}else{
    echo "<script>window.location.href = 'http://localhost/baocaocuoiki/src/';</script>";
    exit();
}
