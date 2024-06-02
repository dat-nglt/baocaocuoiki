<div class="body__container">
    <div class="detail__container">
        <form action="" method="post">
            <div class="detail__title">Chi tiết đơn hàng</div>
            <h1
                style="background: whitesmoke; text-align: center; color: #333; padding: 30px 0 20px 0; font-size: 23px; text-transform: uppercase;">
                Thông tin người nhận</h1>
            <div class="detail__content">
                <div class="detail__info">
                    <div class="detail__info-box">
                        <label for="name">Tài khoản:</label>
                        <input type="text" value="<?= $tenTaiKhoan ?>" readonly>
                    </div>
                    <div class="detail__info-box">
                        <label for="name">Họ & tên:</label>
                        <input type="text" value="<?= $hoTen ?>" readonly>
                    </div>
                </div>
                <div class="detail__info">
                    <div class="detail__info-box">
                        <label for="name">Thời gian:</label>
                        <input type="text" value="<?= date("d-m-Y", strtotime($thoiGian)) ?>" readonly>
                    </div>
                    <div class="detail__info-box">
                        <label for="name">Thành tiền:</label>
                        <input type="text" value="<?= number_format($thanhTien, 0, '.', '.') ?> &#8363;" readonly>
                    </div>
                </div>
            </div>
            <div class="detail__content">
                <div class="detail__info">
                    <div class="detail__info-box">
                        <label for="name">Địa chỉ: </label>
                        <input style="cursor: pointer;" type="text" title="<?= $diaChi ?>" value="<?= $diaChi ?>"
                            readonly>
                    </div>
                </div>
                <div class="detail__info">
                    <div class="detail__info-box">
                        <label for="name">Điện thoại:</label>
                        <input type="text" value="<?= $soDienThoai ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="detail__content">
                <div class="detail__info">
                    <div class="detail__info-box">
                        <label for="name">Trạng thái:</label>
                        <select name="set-status" id="">
                            <option value="0" <?php if ($trangThai === '0')
                                echo 'selected' ?>>Chờ xác nhận</option>
                                <option value="1" <?php if ($trangThai === '1')
                                echo 'selected' ?>>Đã xác nhận</option>
                                <option value="2" <?php if ($trangThai === '2')
                                echo 'selected' ?>>Đang giao hàng</option>
                                <option value="3" <?php if ($trangThai === '3')
                                echo 'selected' ?>>Đơn hàng thành công
                                </option>
                                <option value="4" <?php if ($trangThai === '4')
                                echo 'selected' ?>>Đơn hàng thất bại</option>
                            </select>
                        </div>
                    </div>
                    <div class="detail__info" style="flex: 1">
                        <div class="detail__info-box">
                            <label for="name" style="margin-right: 30px">Ghi chú:</label>
                            <textarea name="" id="" readonly
                                style="outline:none ;line-height: 1.4;width:100%; height:80px; resize:none; padding: 10px 20px;; font-size: 16px; border-radius: 8px;background: lightblue;border: none;"><?= $ghiChu ?></textarea>
                    </div>
                </div>
            </div>
            <div class="detail__content" style="display: block">
                <div class="detail__info" style="flex: 1">
                    <div class="detail__info-box" style="display: block">
                        <h1
                            style="background: whitesmoke; text-align: center; color: #333; padding: 20px 0; font-size: 23px; text-transform: uppercase;">
                            Danh sách sản phẩm</h1>
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
                                    <?= number_format($thanhTien, 0, '.', '.') ?> &#8363;
                                </td>
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