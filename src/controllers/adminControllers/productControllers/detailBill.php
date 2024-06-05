<?php

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
}

$infoBill = mysqli_fetch_assoc(getOneOrderAdmin($conn, $id));
extract($infoBill);
$detailOrder = getDetailOrderAdmin($conn, $maDonHang);

if (isset($_POST['update-bill'])) {
    $id = $_GET['id'];
    $status = $_POST['set-status'];
    $update = updateBillAdmin($conn, $id, $status);
    if ($update) {
        success('Cập nhật thành công', 'http://localhost/baocaocuoiki/admin/index.php?page=detailbill&id=' . $id);
        foreach ($detailOrder as $product) {
            $productId = $product['maSanPham'];
            $addressBill = $product['diaChi'];
            $quantity = $product['soLuong'];
            if ($status === '1') {
                updateQuantityProduct($conn, $quantity, $productId, 'success');
                addLogistics($conn, $productId, $quantity, $addressBill, 'Bán lẻ', 0);
            } elseif ($status === '4') {
                updateQuantityProduct($conn, $quantity, $productId, 'error');
                addLogistics($conn, $productId, $quantity, $addressBill, 'Bán lẻ', 1);
            }
        }
    } else {
        error('Cập nhật không thành công', 'http://localhost/baocaocuoiki/admin/index.php?page=detailbill&id=' . $id);
    }
}

include ('../src/views/admin/bill/detail-bill.php');