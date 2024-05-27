<?php
$countBillSucces = mysqli_num_rows(getBillSuccess($conn));
$countProduct = mysqli_fetch_assoc(getCountProduct($conn));
include('../src/views/admin/thongke.php');
?>