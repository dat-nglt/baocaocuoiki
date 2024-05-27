<?php

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
}

if(isset($_POST['update-bill'])){
    $id = $_GET['id'];
    $status = $_POST['set-status'];
    $update = updateBillAdmin($conn, $id, $status);
    if($update){
        success('Cập nhật thành công', 'http://localhost/baocaocuoiki/admin/index.php?page=detailbill&id='.$id);
    }else{
        error('Cập nhật không thành công', 'http://localhost/baocaocuoiki/admin/index.php?page=detailbill&id='.$id);
    }
}

$infoBill = mysqli_fetch_assoc(getOneOrderAdmin($conn, $id));
extract($infoBill);
$detailOrder = getDetailOrderAdmin($conn, $maDonHang);
include('../src/views/admin/bill/detail-bill.php');