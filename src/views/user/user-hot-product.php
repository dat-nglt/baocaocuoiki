<div class="list-menuBack">
    <div class="content-menuBack">
        <a href="index.php"><i class="fa-solid fa-house" style="margin-right: 5px;"></i> Trang chủ</a>
        <span class="separator"> <i class="fa-solid fa-angle-right"></i> </span>
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
            <div class="category-product-content product">
                <?php if ($listProduct->num_rows <= 0) { ?>
                    <div class="empty__product">Chưa có sản phẩm thuộc mục này</div>
                <?php } else { ?>
                    <?php foreach ($listProduct as $key => $value) {
                        extract($value);
                        $maSanPham1 = $maSanPham;
                        $linkProduct = "index.php?page=details-product&id=" . $maSanPham1;
                        $price = ($giaTien - ($giaTien * ($giaGiam / 100)));
                        ?>
                        <div class="category-product product">
                            <a href="<?= $linkProduct ?>">
                                <img class="imgProduct" src="<?= $hinhAnh ?>" alt="">
                                <div class="info-product">
                                    <div class="name-product">
                                        <?= $tenSanPham ?>
                                    </div>
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
                                        <?= $daBan ?>
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
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="list__paging">
        <div>
            <?php
            if ($total_page > 1) {
                if ($current_page > 3) {
                    echo '<a href="http://localhost/baocaocuoiki/src/index.php?page=hotproduct&pageNumber=1"> <button><i class="fa-solid fa-angles-left"></i></button></a>';
                }
                if ($current_page > 1) {
                    echo ' <a href="http://localhost/baocaocuoiki/src/index.php?page=hotproduct&pageNumber=' . ($current_page - 1) . '"><button><i class="fa-solid fa-angle-left"></i></button></a>';
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i != $current_page) {
                        if ($i > $current_page - 3 && $i < $current_page + 3) {
                            echo '<a href="http://localhost/baocaocuoiki/src/index.php?page=hotproduct&pageNumber=' . $i . '"><button class="button">' . $i . '</button></a>';
                        }
                    } else {
                        echo '<a href="http://localhost/baocaocuoiki/src/index.php?page=hotproduct&pageNumber=' . $i . '" class="button-current"><button class="button" >' . $i . '</button></a>';
                    }
                }
                if ($current_page < $total_page) {
                    echo '<a href="http://localhost/baocaocuoiki/src/index.php?page=hotproduct&pageNumber=' . ($current_page + 1) . '"> <button><i class="fa-solid fa-angle-right"></i></button></a>';
                }
                if ($current_page < $total_page - 2) {
                    echo '<a href="http://localhost/baocaocuoiki/src/index.php?page=hotproduct&pageNumber=' . ($total_page) . '"><button><i class="fa-solid fa-angles-right"></i></button></a>';
                }
            }
            ?>
        </div>
    </div>
</div>

<script src="./js/addToCart.js"></script>