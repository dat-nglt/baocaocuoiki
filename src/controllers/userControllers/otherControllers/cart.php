<?php
$countProduct = array();
if(isset($_POST['minusCount'])){
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value[0] == $_POST['changequantitycart']) {
            
                $_SESSION['cart'][$key][3] -= 1;
                $_SESSION['cart'][$key][5] -= $_POST['changepricecart'];
        }
    }
}
if(isset($_POST['plusCount'])){
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value[0] == $_POST['changequantitycart1']) {
            $_SESSION['cart'][$key][3] += 1;
            $_SESSION['cart'][$key][5] += $_POST['changepricecart1'];
        }
    }
}
foreach ($_SESSION['cart'] as $key => $value) {
    $countProduct[$value[0]] = mysqli_fetch_assoc(getOneProduct($conn, ''.$value[0].''))['soLuong'];
}
include("./views/user/user-cart.php");
?>
<script>
    
</script>