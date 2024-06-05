<!-- <style>
    .ttmota > table td {
        padding: 10px 0;
    }
    background-color: #ffffff;
    /* border-radius: 5px; */
    padding: 10px 30px 10px;
    border-top: 1px solid;
    margin-top: 10px
</style> -->

<div class="list-menuBack">
    <div class="content-menuBack">
        <a href="index.php"><i class="fa-solid fa-house" style="margin-right: 5px;"></i> Trang chủ</a>
        <span class="separator"> <i class="fa-solid fa-angle-right"></i> </span>
        <a href="index.php?page=category-product&id=<?= $detailProduct['maLoai'] ?>">

            <?php echo $detailProduct['tenLoai']; ?>
        </a>
        <span> <i class="fa-solid fa-angle-right"></i> </span>
        <span style="color: var();">
            <?php echo $detailProduct['tenSanPham']; ?>
        </span>
    </div>
</div>
<div class="container detail-product main">
    <div class="box-contentDetail">
        <div class="content">
            <div class="sale-prodoct-header">
                <div id="title">
                    Thông tin sản phẩm
                </div>
            </div>
            <div class="s">
                <?php
                if ($detailProduct['giaGiam'] != 0 && (strtotime($detailProduct['ngayHetHanGiam']) > strtotime(date('Y-m-d')))) {
                    $price = ($detailProduct['giaTien'] - ($detailProduct['giaTien'] * ($detailProduct['giaGiam'] / 100)));
                } else {
                    $price = $detailProduct['giaTien'];
                }
                ?>
                <div>
                    <img src="<?= $detailProduct['hinhAnh'] ?>" alt="">

                </div>
                <div class="ssss">
                    <h2>
                        <?php echo $detailProduct['tenSanPham']; ?>
                    </h2>
                    <div class="sss">
                        <?php if ($price != $detailProduct['giaTien']) { ?>
                            <div class="" style="padding:0; color: grey; font-size: 1.4rem;">
                                <span
                                    style="text-decoration: line-through; color: grey;"><?php echo number_format($detailProduct['giaTien'], 0, '.', '.'); ?></span><span
                                    id="vnd">&#8363;</span> (-<?= $detailProduct['giaGiam'] ?>%)
                            </div>
                        <?php } ?>
                        <div style="font-size: 2rem;">
                            <?php echo number_format($price, 0, '.', '.'); ?><span id="vnd">&#8363;</span>
                        </div>
                    </div>
                    <div>Tình trạng :
                        <?php if ($detailProduct['soLuong'] > 0) { ?> <b style="color: seagreen">Còn hàng</b>
                        <?php } else { ?> <b style="color: red">Hết hàng</b>
                        <?php } ?>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="tensanpham" value="<?= $detailProduct['tenSanPham'] ?>">
                        <input type="hidden" name="giasanpham" value="<?= $price ?>">
                        <input type="hidden" name="hinhanh" value="<?= $detailProduct['hinhAnh'] ?>">
                        <?php if ($detailProduct['soLuong'] <= 0) { ?>
                            <button class="button-buy" disabled
                                style="background-color: gray; width: 400px; margin-top: 10px;">
                                LIÊN HỆ <p style="font-size: 1.4rem; margin-top: 3px; font-weight: 400;">(1900 2601) để nhận
                                    thông tin khi có hàng!</p></button>
                        <?php } else { ?>
                            <button class="button-buy"
                                style="background: seagreen; width: 400px; cursor: pointer; margin-top: 10px;" ;
                                id="button-buy-now" type="submit" name="addtocart">
                                MUA NGAY <p style="font-size: 1.4rem; margin-top: 3px; font-weight: 400;">Giao tận nơi
                                    hoặc
                                    nhận
                                    tại cửa hàng</p></button>
                        <?php } ?>
                        <div class="service-gift">
                            <div class="service-product">
                                <p class="gift-title">Ưu đãi:</p>
                                <p>✔ Bảo hành chính hãng 24 tháng.</p>
                                <p>✔ Hỗ trợ đổi mới trong 7 ngày.</p>
                                <p>✔ Miễn phí giao hàng toàn quốc.</p>
                            </div>
                            <div class="gift-product">
                                <p class="gift-title">Quà tặng:</p>
                                <p>🎁 Balo Z3 - Generation</p>
                                <p>🎁 Móc khoá Z3 - Generation</p>
                                <p>🎁 Lót chuột Z3 - Generation</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </form>
        </div>

        <div class="detail-des">
            <div class="ttmota">
                <span class="name-des">Thông số kỹ thuật:</span>
                <?php echo $detailProduct['moTa']; ?>
            </div>
        </div>
    </div>

    <div class="sale-product">
        <div class="sale-prodoct-header">
            <div id="title">Sản phẩm cùng thương hiệu</div>
            <div id="time"></div>
        </div>
        <div class="sale-product-content slider">
            <?php foreach ($listProduct as $key => $value) {
                extract($value);
                $maSanPham1 = $maSanPham;
                $linkProduct = "index.php?page=details-product&id=" . $maSanPham1;
                $price = ($giaTien - ($giaTien * ($giaGiam / 100)));
                ?>
                <div class="product scale-item">
                    <a href="<?= $linkProduct ?>">
                        <img class="imgProduct" src="<?= $hinhAnh ?>" alt="">
                        <div class="info-product">
                            <div class="name-product"><?= $tenSanPham ?></div>
                            <div class="price__sale" style="display: flex; gap: 15px; align-items: center;">
                                <div class="price-product"><?= number_format($price, 0, '.', '.') ?><span
                                        id="vnd">&#8363;</span></div>
                                <?php if ($price != $giaTien) {
                                    echo '<div class="price-product"
                                            style="color: #888;text-decoration: line-through; font-size: 11px;">' . number_format($giaTien, 0, '.', '.') . '<span
                                            id="vnd">&#8363;</span></div>';
                                } ?>
                            </div>
                            <div class="sold">Đã bán:
                                <?= ceil($arrayProductFlashSaleSold[$maSanPham1]['sum(soLuong)']) ?>
                            </div>
                        </div>
                    </a>
                    <?php if ($soLuong > 0) { ?>
                        <div class="add-to-cart" data-id="<?= $maSanPham1 ?>" data-price="<?= $price ?>">Thêm
                            vào giỏ</div>
                    <?php } else { ?>
                        <div class="out-count" disabled>Đã hết hàng</div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="./js/addToCart.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script>

    $('.slider').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
    });

</script>