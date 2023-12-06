<div class="container category-product main">
    <div class="list-menu">
        <a href="index.php">Z3G</a>
        <span class="separator"> > </span>
        <span style="font-size: 16px;">
            Flash sale
        </span>
    </div>
    <div class="category-product">
        <div class="category-product-list">
            <div class="category-sidebar">
                <p>Danh mục sản phẩm</p>
                <ul>
                <li>
                        <form action="index.php?page=allproduct" method="post">
                            <input type="hidden" name="unset-session" value="">
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
                <?php foreach ($arrayProductFlashSale as $key => $value) {
                    extract($value);
                    $maSanPham1 = $maSanPham;
                    $linkProduct = "index.php?page=details-product&id=" . $maSanPham1;
                    $imgProduct = "./img/Product/" . $hinhAnh . "";
                        $price = ($giaTien - ($giaTien*($giaGiam/100))) ; 
                    ?>
                    <a href="<?= $linkProduct ?>">
                        <div class="category-product">
                            <img src="<?= $imgProduct ?>" alt="">
                            <div class="info-product">
                                <div class="name-product">
                                    <?= $tenSanPham ?>
                                </div>
                                <div class="product-price">
                                    <?= number_format($price, 0, '.', '.') ?><span id="vnd">&#8363;</span>
                                </div>
                                <div class="sold">Đã bán: <?=ceil($arrayProductFlashSaleSold[$maSanPham1]['sum(soLuong)'])?></div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>