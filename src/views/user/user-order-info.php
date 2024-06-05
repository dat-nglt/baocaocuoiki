<div class="container user-cart">
    <div class="sale-prodoct-header">
        <div id="title">
            Thông tin sản phẩm
        </div>
    </div>
    <div class="product-cart">
        <?php
        foreach ($_SESSION['cart'] as $key => $value) {
            ?>
            <div class="detail-product-cart" style="grid-template-columns: 15% 85%">
                <img src="<?= $value[2] ?>" alt="">
                <div class="info-product">
                    <div class="info-product-name">
                        <?= $value[1] ?>
                    </div>
                    <div id="price" class="info-product-name">
                        <span>
                            Giá sản phẩm: <span style="color:red; display: inline">
                                <?= number_format($value[4], 0, '.', '.') ?> <span id="vnd">&#8363;</span>
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
    <!-- =================================== -->
    <div class="user-info-cart">
        <div class="pay-title">Thanh Toán và Giao Hàng</div>
        <form id="info-form" action="" method="POST">
            <div class="info-field-cart">
                <label for="">Họ và tên</label>
                <input name="order-name" required type="text" placeholder="VD: Nguyễn Văn A">
            </div>
            <div class="info-field-cart">
                <label for="">Số điện thoại</label>
                <input name="order-number" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required type="text"
                    placeholder="VD: 039988770">
            </div>
            <div class="info-field-cart">
                <label for="">Địa chỉ</label>
                <input name="order-address" required type="text" placeholder="VD: Đường Trần Duy Hưng">
            </div>
            <div class="info-field-cart">
                <label for="">Ghi chú đơn hàng (Tuỳ chọn)</label>
                <textarea name="order-note" required name="" id="" cols="30" rows="5" placeholder=""></textarea>
            </div>
            <div class="total-pay">
                <label for="">Tạm tính:</label>
                <div class="price"><?= number_format($thanhtien, 0, '.', '.') ?> <span id="vnd"> &#8363;</span></div>
            </div>
            <button id="orderButton" type="submit" name="order-btn" style="background-color: #ff9a00;"
                class="button-buy">Đặt hàng</button>
        </form>
    </div>
</div>