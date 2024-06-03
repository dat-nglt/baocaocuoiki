<div class="list-menuBack">
    <div class="content-menuBack">
        <a href="index.php"><i class="fa-solid fa-house" style="margin-right: 5px;"></i> Trang chủ</a>
        <span class="separator"> > </span>
        <span>
            Sản phẩm bán chạy
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
                <?php foreach ($listProduct as $key => $value) {
                    extract($value);
                    $maSanPham1 = $value[0];
                    $linkProduct = "index.php?page=details-product&id=" . $maSanPham1;
                    $price = ($value[3] - ($value[3] * ($value[6] / 100)));
                    ?>
                    <div class="category-product">
                        <a href="<?= $linkProduct ?>">
                            <img class="imgProduct" src="<?= $value[2] ?>" alt="">
                            <div class="info-product">
                                <div class="name-product">
                                    <?= $value[1] ?>
                                </div>
                                <div class="price__sale" style="display: flex; gap: 15px; align-items: center;">
                                    <div class="price-product"><?= number_format($price, 0, '.', '.') ?><span
                                            id="vnd">&#8363;</span></div>
                                    <?php if ($price != $value[3]) {
                                        echo '<div class="price-product"
                                            style="color: #888;text-decoration: line-through; font-size: 11px;">' . number_format($value[3], 0, '.', '.') . '<span
                                            id="vnd">&#8363;</span></div>';
                                    } ?>
                                </div>
                                <div class="sold">Đã bán:
                                    <?= $value[9] ?>
                                </div>
                            </div>
                        </a>
                        <button type="button" class="add-to-cart" data-id="<?= $value[0] ?>"
                            data-price="<?= $value[3] ?>">Thêm vào giỏ</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>