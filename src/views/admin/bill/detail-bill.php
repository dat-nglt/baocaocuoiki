<div class="body__container">
    <div class="detail__container">
        <form action="" method="post">
            <div class="detail__title">Chi tiết đơn hàng</div>
            <div class="detail__content">
                <div class="detail__info">
                    <div class="detail__info-box">
                        <label for="name">Tên tài khoản đặt hàng:</label>
                        <input type="text" value="<?= $tenTaiKhoan ?>" readonly>
                    </div>
                    <div class="detail__info-box">
                        <label for="name">Họ tên người nhận:</label>
                        <input type="text" value="<?= $hoTen ?>" readonly>
                    </div>
                </div>
                <div class="detail__info">
                    <div class="detail__info-box">
                        <label for="name">Thời gian đặt hàng:</label>
                        <input type="text" value="<?= date("d-m-Y", strtotime($thoiGian)) ?>" readonly>
                    </div>
                    <div class="detail__info-box">
                        <label for="name">Tổng giá trị đơn hàng:</label>
                        <input type="text" value="<?= number_format($thanhTien, 0, '.', '.') ?> &#8363;" readonly>
                    </div>
                </div>
            </div>
            <div class="detail__content">
                <div class="detail__info">
                    <div class="detail__info-box">
                        <label for="name">Địa chỉ nhận hàng:</label>
                        <input type="text" value="<?= $diaChi ?>" readonly>
                    </div>
                </div>
                <div class="detail__info">
                    <div class="detail__info-box">
                        <label for="name">Số điện thoại:</label>
                        <input type="text" value="<?= $soDienThoai ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="detail__content">
                <div class="detail__info">
                    <div class="detail__info-box">
                        <label for="name">Trạng thái đơn hàng:</label>
                        <select name="set-status" id="">
                            <option value="0" <?php if($trangThai === '0') echo 'selected' ?>>Chờ xác nhận</option>
                            <option value="1" <?php if($trangThai === '1') echo 'selected' ?>>Đã xác nhận</option>
                            <option value="2" <?php if($trangThai === '2') echo 'selected' ?>>Đang giao hàng</option>
                            <option value="3" <?php if($trangThai === '3') echo 'selected' ?>>Đơn hàng thành công</option>
                            <option value="4" <?php if($trangThai === '4') echo 'selected' ?>>Đơn hàng thất bại</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="detail__content" style="display: block">
                <div class="detail__info" style="flex: 1">
                    <div class="detail__info-box">
                        <label for="name">Ghi chú:</label>
                        <textarea name="" id=""
                            style="outline:none ;width:81%; height:150px; resize:none; padding: 5px; font-size: 17px;"><?= $ghiChu ?></textarea>
                    </div>
                </div>
            </div>
            <div class="detail__content" style="display: block">
                <div class="detail__info" style="flex: 1">
                    <div class="detail__info-box" style="display: block">
                        <label for="name">Danh sách sản phẩm</label>
                        <table style="width: 100%">
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th style="width: 55%;">Tên sản phẩm</th>
                                <th style="width: 10%;">Số lượng</th>
                                <th style="width: 15%;">Đơn giá</th>
                                <th style="width: 15%;">Tổng tiền</th>
                            </tr>
                            <?php
                            $stt = 1;
                            foreach ($detailOrder as $key => $value) {
                                extract($value); ?>
                                <tr>
                                    <td><?= $stt ?></td>
                                    <td>
                                        <div class="list__hidden-text" style="-webkit-line-clamp: 2;">
                                            <?= $tenSanPham ?>
                                        </div>
                                    </td>
                                    <td><?= $soLuong ?></td>
                                    <td><?= number_format($donGia, 0, '.', '.') ?> &#8363;</td>
                                    <td><?= number_format($tongTien, 0, '.', '.') ?> &#8363;</td>
                                </tr>
                                <?php $stt++;
                            } ?>
                            <tr>
                                <td style="text-align: end; padding: 10px" colspan="5">Tổng thanh toán:
                                    <?= number_format($thanhTien, 0, '.', '.') ?> &#8363;</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="detail__content" style="display: flex;align-items: end;justify-content: end;">
                <button name="update-bill">Xác nhận</button>
        </form>
    </div>
</div>