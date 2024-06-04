<div class="list-menuBack">
    <div class="content-menuBack">
        <a href="index.php"><i class="fa-solid fa-house" style="margin-right: 5px;"></i> Trang chủ</a>
        <span class="separator"> <i class="fa-solid fa-angle-right"></i> </span>
        <span>
            Flash sale
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
                <?php if (empty($arrayProductFlashSale)) { ?>
                    <div class="empty__product">Chưa có sản phẩm thuộc mục này</div>
                <?php } else { ?>
                    <?php foreach ($arrayProductFlashSale as $key => $value) {
                        extract($value);
                        $maSanPham1 = $maSanPham;
                        $linkProduct = "index.php?page=details-product&id=" . $maSanPham1;
                        $price = ($giaTien - ($giaTien * ($giaGiam / 100)));
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
                    echo 'http://localhost/baocaocuoiki/src/index.php?page=flashsale&pageNumber=1"> <button><i class="fa-solid fa-angles-left"></i></button></a>';
                }
                if ($current_page > 1) {
                    echo ' http://localhost/baocaocuoiki/src/index.php?page=flashsale&pageNumber=' . ($current_page - 1) . '"><button><i class="fa-solid fa-angle-left"></i></button></a>';
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i != $current_page) {
                        if ($i > $current_page - 3 && $i < $current_page + 3) {
                            echo 'http://localhost/baocaocuoiki/src/index.php?page=flashsale&pageNumber=' . $i . '"><button class="button">' . $i . '</button></a>';
                        }
                    } else {
                        echo 'http://localhost/baocaocuoiki/src/index.php?page=flashsale&pageNumber=' . $i . '" class="button-current"><button class="button" >' . $i . '</button></a>';
                    }
                }
                if ($current_page < $total_page) {
                    echo 'http://localhost/baocaocuoiki/src/index.php?page=flashsale&pageNumber=' . ($current_page + 1) . '"> <button><i class="fa-solid fa-angle-right"></i></button></a>';
                }
                if ($current_page < $total_page - 2) {
                    echo 'http://localhost/baocaocuoiki/src/index.php?page=flashsale&pageNumber=' . ($total_page) . '"><button><i class="fa-solid fa-angles-right"></i></button></a>';
                }
            }
            ?>
        </div>
    </div>
</div>