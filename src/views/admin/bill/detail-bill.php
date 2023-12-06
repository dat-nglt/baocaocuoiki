<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_order = "SELECT * FROM donhang WHERE maDonHang = '$id'";
    $order_query = mysqli_query($conn, $sql_order);
    $order = mysqli_fetch_assoc($order_query);

    // $id_account = $order['maNguoiDung'];
    // $sql_account = "SELECT * FROM nguoidung WHERE maNguoiDung = '$id_account'";
    // $account_query = mysqli_query($conn, $sql_account);
    // $account = mysqli_fetch_assoc($account_query);

    $sql_detail = "SELECT CT.maCTDH, SP.tenSanPham, SP.hinhAnh, CT.soLuong, CT.donGia, CT.tongTien, DH.thanhTien FROM chitietdonhang CT, donhang DH, sanpham SP WHERE CT.maSanPham = SP.maSanPham AND DH.maDonHang = CT.maDonHang AND CT.maDonHang = '$id'";
    $detail = mysqli_query($conn, $sql_detail);

    if (isset($_POST['status'])) {
        $status = $_POST['status'];

        mysqli_query($conn, "UPDATE donhang SET trangThai = '$status' WHERE maDonHang = '$id'");

        header('location: index.php?page=listbills');
    }

}

?>

<div class="container-form detail-bill">
    <div class="table-title"><i class="fa-solid fa-pen-to-square"></i>Chi tiết đơn hàng</div>
    <div class="user-info-detail">
        <div class="info-item-detail">
            <p><span class="title-aaa">Khách hàng: </span>
                <?php echo $order['hoTen'] ?>
            </p>
            <p><span class="title-aaa">Số điện thoại: </span>
                <?php echo $order['soDienThoai'] ?>
            </p>
            <p><span class="title-aaa">Trạng thái đơn hàng: </span>
                <?php if ($order['trangThai'] == 0) { ?>
                    Chưa xử lý
                <?php } elseif ($order['trangThai'] == 1) { ?>
                    Đã duyệt
                <?php } ?>
            </p>
        </div>

        <div class="info-item-detail">
            <p><span class="title-aaa">Ngày đặt hàng: </span>
                <?php $date_up = $order['thoiGian'];
                $formattedDate = date("d/m/Y", strtotime($date_up));
                echo $formattedDate; ?>
            </p>
            <p><span class="title-aaa">Ghi chú: </span>
                <?php echo $order['ghiChu'] ?>
            </p>
            <p><span class="title-aaa">Địa chỉ nhận hàng: </span>
                <?php echo $order['diaChi'] ?>
            </p>
        </div>
    </div>

    <table class="table-account">
        <tr>
            <th style="width: 5%">Mã CTDH</th>
            <th style="width: 40%">Tên sản phẩm</th>
            <th style="width: 15%">Hình ảnh</th>
            <th style="width: 5%">Số lượng</th>
            <th style="width: 15%">Đơn giá</th>
            <th style="width: 20%">Tổng tiền</th>
        </tr>
        <?php

        foreach ($detail as $key => $value) {
            extract($value) ?>
            <tr>
                <td>
                    <?= $maCTDH ?>
                </td>
                <td>
                    <?= $tenSanPham ?>
                </td>
                <td>
                    <img style="witdh: 100px; height: 100px;" src="../src/img/Product/<?= $hinhAnh ?>" alt="">
                </td>
                <td>
                    <?= $soLuong ?>
                </td>

                <td>
                    <?= $formattedAmount = number_format($donGia, 0, ',', '.') ?><span id="vnd">&#8363;</span>
                </td>

                <td>
                    <?= $formattedAmount = number_format($tongTien, 0, ',', '.') ?><span id="vnd">&#8363;</span>
                </td>
            </tr>
        <?php }
        ?>
    </table>

    <div class="total-price">Thành tiền:
        <?= $formattedAmount = number_format($thanhTien, 0, ',', '.') ?>
    </div>

    <form action="" method='post' id='form-status'>
        <label for="">Trạng thái:</label>
        <select name="status" id="" required='required'>
            <option value="0" <?php if($order['trangThai'] == 0) echo 'selected'; ?>>Chưa xử lý</option>
            <option value="1" <?php if($order['trangThai'] == 1) echo 'selected'; ?>>Đã duyệt</option>
        </select>

        <button type="submit" class='btn-detail'>Cập nhật</button>
    </form>

</div>