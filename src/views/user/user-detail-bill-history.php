<div class="details main">
    <div class="sub-container info-order">
        <div id="title-info-order">Thông Tin Chi Tiết Đơn Hàng</div>
        <div id="content-info-order">
            <div>Tên người nhận hàng: <span><?= $detailBill['hoTen']?></span></div>
            <div>Mã đơn hàng: <span><?= $detailBill['maDonHang']?></span></div>
            <div>Ngày đặt hàng: <span><?= date('d-m-Y',strtotime($detailBill['thoiGian'])) ?></span></div>
            <div>Số điện thoại: <span><?= $detailBill['soDienThoai']?></span></div>
            <div>Địa chỉ: <span><?= $detailBill['diaChi']?></span></div>
            <div>Ghi chú: <span><?= $detailBill['ghiChu']?></span></div>
            <div>Tổng tiền: <span ><?= number_format($detailBill['thanhTien'],0,'.','.')?></span><span id="vnd">&#8363;</span></div>
        </div>
    </div>
    <div class="sub-container list-product">
        <?php foreach ($listProductBill as $key => $value) {
            extract($value);
            ?>
            <div class="detail-product-cart" style="grid-template-columns: 25% 75%">
            <img src="img/Product/<?= $product[$value[2]]['hinhAnh']?>" alt="">
            <div class="info-product">
                <div class="info-product-name">
                    <?= $product[$value[2]]['tenSanPham']?>
                </div>
                <div id="price" class="info-product-name">
                    <span>
                        Giá sản phẩm: <span style="color:red; display: inline">
                        <?= number_format($value[5],0,'.','.')?> <span id="vnd">&#8363;</span>
                        </span>
                    </span>
                    <span>
                        Số lượng: <span style="color:red; display: inline">
                        <?= $value[3]?>
                        </span>
                    </span>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>