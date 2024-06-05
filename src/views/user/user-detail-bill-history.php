<style>
    .details {
        height: fit-content;
        width: 1000px;
        padding: 20px;
        border-radius: 7px;
        background: #fff
    }

    .sub-container {
        width: 100%;
        padding: 10px;
    }


    .sub-container.list-product {
        height: 60%;
        overflow: scroll;
        overflow-x: hidden;
        display: flex;
        flex-direction: column;
        gap: 5px;

        &::-webkit-scrollbar {
            width: 0px;
            /* Độ rộng của thanh cuộn */
        }

        &::-webkit-scrollbar-track {
            background-color: #f1f1f1;
            /* Màu nền của đường track */
        }

        &::-webkit-scrollbar-thumb {
            background-color: #888;
            /* Màu của núm cuộn */
            border-radius: 4px;
            /* Bo góc của núm cuộn */
        }

        &::-webkit-scrollbar-thumb:hover {
            background-color: #555;
            /* Màu của núm cuộn khi hover */
        }
    }

    .sub-container.info-order {
        margin-bottom: 10px;
        height: 40%;
        background-color: transparent;
        padding-bottom: 10px;
    }

    .title-info-order {
        font-size: 25px;
        font-weight: bold;
        color: #ffa808;
        padding: 0 0 10px 0px;
        text-transform: capitalize;
    }

    #content-info-order {
        padding: 0px 20px;
        font-size: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 12px;
        text-transform: capitalize;
        color: rgb(89, 83, 83);
        font-weight: bold;
    }

    #content-info-order div span {
        font-weight: normal;
    }
</style>

<div class="details main">
    <div class="sub-container info-order">
        <div class="title-info-order" style="margin-bottom: 10px;">Thông Tin Chi Tiết Đơn Hàng</div>
        <div id="content-info-order">
            <div>Tên người nhận hàng: <span><?= $detailBill['hoTen'] ?></span></div>
            <div>Mã đơn hàng: <span><?= $detailBill['maDonHang'] ?></span></div>
            <div>Ngày đặt hàng: <span><?= date('d-m-Y', strtotime($detailBill['thoiGian'])) ?></span></div>
            <div>Số điện thoại: <span><?= $detailBill['soDienThoai'] ?></span></div>
            <div>Địa chỉ: <span><?= $detailBill['diaChi'] ?></span></div>
            <div>Ghi chú: <span><?= $detailBill['ghiChu'] ?></span></div>
            <div>Tổng tiền: <span
                    style="color: red; font-weight: 600"><?= number_format($detailBill['thanhTien'], 0, '.', '.') ?>
                    VNĐ</span>
            </div>
            <?php
            if ($detailBill['trangThai'] == 0) {
                $trangThaiDonHang = 'Đơn hàng chờ xác nhận';
            } else if ($detailBill['trangThai'] == 1) {
                $trangThaiDonHang = 'Đơn hàng đã xác nhận';
            } else if ($detailBill['trangThai'] == 2) {
                $trangThaiDonHang = 'Đang giao hàngàng đang ';
            } else if ($detailBill['trangThai'] == 3) {                $trangThaiDonHang = 'Đơn hàng thành công';
            } else if ($detailBill['trangThai'] == 4) {
                $trangThaiDonHang = 'Đơn hàng thất bại';
            }
            ?>
            <div>Trạng thái đơn hàng: <span style="color: green; font-weight: 600"><?= $trangThaiDonHang ?></span>
            </div>
        </div>
    </div>
    <div class="sub-container list-product">
        <div class="title-info-order">Danh sách sản phẩm đã mua</div>
        <?php foreach ($listProductBill as $key => $value) {
            extract($value);
            ?>
            <div class="detail-product-cart" style="grid-template-columns: 15% 85%;">
                <img src="<?= $product[$value[2]]['hinhAnh'] ?>" alt="">
                <div class="info-product">
                    <div class="info-product-name">
                        <?= $product[$value[2]]['tenSanPham'] ?>
                    </div>
                    <div id="price" class="info-product-name">
                        <span>
                            Giá sản phẩm: <span style="color:red; display: inline">
                                <?= number_format($value[5], 0, '.', '.') ?> <span id="vnd">&#8363;</span>
                            </span>
                        </span>
                        <span>
                            Số lượng: <span style="color:red; display: inline">
                                <?= $value[3] ?>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>