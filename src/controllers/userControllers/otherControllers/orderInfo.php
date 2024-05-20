<?php
if(count($_SESSION['cart']) > 0){
    $thanhtien = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $thanhtien += $_SESSION['cart'][$key][5];
    }
    if(isset($_POST['order-btn'])){
        $name = $_POST['order-name'];
        $tel = $_POST['order-number'];
        $address = $_POST['order-address'];
        $note = $_POST['order-note'];
        $time = date('Y-m-d');
        addBill($conn,$_SESSION['user']['maNguoiDung'],$time,$thanhtien,$address,$name,$tel,$note);
        $last_id = mysqli_insert_id($conn);
        foreach ($_SESSION['cart'] as $key => $value) {
            addDetailBill($conn,$last_id,$_SESSION['cart'][$key][0],$_SESSION['cart'][$key][3],$_SESSION['cart'][$key][4],$_SESSION['cart'][$key][5]);
        }
        unset($_SESSION['cart']);
        header("Location: index.php?page=success-order");
        exit();
    }
    include("./views/user/user-order-info.php");
    return;
}else{
    header("Location: index.php");
    exit();
}

?>