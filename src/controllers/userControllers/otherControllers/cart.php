<?php
$countProduct = array();
if(isset($_POST['minusCount'])){
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value[0] == $_POST['changequantitycart']) {
            
                $_SESSION['cart'][$key][3] -= 1;
                $_SESSION['cart'][$key][5] -= $_POST['changepricecart'];
                updateQuantityProduct1($conn,1,$_POST['changequantitycart']);
        
        }
    }
}
if(isset($_POST['plusCount'])){
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value[0] == $_POST['changequantitycart1']) {
            $_SESSION['cart'][$key][3] += 1;
            $_SESSION['cart'][$key][5] += $_POST['changepricecart1'];
            updateQuantityProduct($conn,1,$_POST['changequantitycart1']);
        }
    }
}
if(isset($_POST['delete-cart'])){
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value[0] == $_POST['id-delete']) {
            updateQuantityProduct1($conn,$_SESSION['cart'][$key][3],$_POST['id-delete']);
            unset($_SESSION['cart'][$key]);
        }
    }
}
foreach ($_SESSION['cart'] as $key => $value) {
    $countProduct[$value[0]] = mysqli_fetch_assoc(getOneProduct($conn, ''.$value[0].''))['soLuong'];
}var_dump($countProduct);
include("./views/user/user-cart.php");
?>