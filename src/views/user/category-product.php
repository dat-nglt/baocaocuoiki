<div class="list-menuBack">
    <div class="content-menuBack">
        <a href="index.php"><i class="fa-solid fa-house"></i> Trang chủ</a>
        <span class="separator"> <i class="fa-solid fa-angle-right"></i> </span>
        <span>
            <?= $nameClassify ?>
        </span>
    </div>
</div>
<div class="container category-product main">
    <div class="category-product">
        <div class="category-product-list">
            <div class="category-sidebar">
                <p>Danh mục sản phẩm</p>
                <ul>
                    <li>
                        <form action="index.php?page=allproduct" method="post">
                            <input type="hidden" name="" value="">
                            <button type="submit" name='all-product'>Tất cả sản phẩm</button>
                        </form>
                    </li>
                    <li><a href="index.php?page=flashsale">Flash sale</a></li>
                    <li><a href="index.php?page=hotproduct">Sản phẩm bán chạy</a></li>
                    <?php foreach ($listClassify as $key => $value) {
                        extract($value);
                        $linkClassify = "index.php?page=category-product&id=" . $maLoai;
                        ?>
                        <li><a href="<?= $linkClassify ?>">
                                <?= $tenLoai ?>
                            </a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="category-product-content">
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
                    <a href="<?= $linkProduct ?>">
                        <div class="category-product">
                            <img src="<?= $hinhAnh ?>" alt="">
                            <div class="info-product">
                                <div class="name-product">
                                    <?= $tenSanPham ?>
                                </div>
                                <div class="product-price">
                                    <?= number_format($price, 0, '.', '.') ?><span id="vnd">&#8363;</span>
                                </div>
                                <div class="sold">Đã bán:
                                    <?= ceil($arrayProductFlashSaleSold[$maSanPham1]['sum(soLuong)']) ?>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php
                } ?>
            </div>
        </div>
    </div>
</div>