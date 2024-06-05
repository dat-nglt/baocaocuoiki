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
                        <?php if ($detailProduct['soLuong'] > 0) { ?> <b style="color: green">Còn hàng</b>
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

    <div class="slider-form">
        <div class="sale-prodoct-header">
            <div id="title">
                Sản phẩm cùng thương hiệu
            </div>
        </div>
        <div class="slider">
            <?php
            foreach ($listProduct as $key => $value) {
                extract($value);
                $maSanPham1 = $maSanPham;
                $linkProduct = "index.php?page=details-product&id=" . $maSanPham1;
                if ($giaGiam != 0 && (strtotime($ngayHetHanGiam) > strtotime(date('Y-m-d')))) {
                    $price = ($giaTien - ($giaTien * ($giaGiam / 100)));
                } else {
                    $price = $giaTien;
                }
                ?>
                <div class="mx-2">
                    <a href="<?= $linkProduct ?>">
                        <img src="<?= $hinhAnh ?>" alt="">
                    </a>
                    <div class="text-center xyz">
                        <h2 class="pt-2 fw-bold"><?= $tenSanPham ?></h2>
                        <div class="product-price">
                            <?= number_format($price, 0, '.', '.') ?><span id="vnd">&#8363;</span>
                        </div>
                        <div class="sold">Đã bán:
                            <?= ceil($arrayProductFlashSaleSold[$maSanPham1]['sum(soLuong)']) ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

    </div>
</div>

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