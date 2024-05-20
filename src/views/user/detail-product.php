<?php
$input_string = $detailProduct['tenSanPham'];
$pattern = '/\((.*?)\)/';
$replacement = '';
$result = preg_replace($pattern, $replacement, $input_string);
echo $result;
?>

<div class="container detail-product main">
    <div class="list-menuBack">
        <a href="index.php">Z3G</a>
        <span class="separator"> > </span>
        <a href="index.php?page=category-product&id=<?= $detailProduct['maLoai'] ?>">
            <?php echo $detailProduct['tenLoai']; ?>
        </a>
        <span class="separator"> > </span>
        <span style="font-size: 16px;">
            <?php echo $result; ?>
        </span>
    </div>
    <div class="content">
        <div class="s">
            <?php if ($detailProduct['hinhAnh'] != '') {
                $imgProduct = '../src/img/Product/' . $detailProduct['hinhAnh'] . '';
            } else {
                $imgProduct = '../src/img/Product/giay-mlb-liner-mid-monogram-ny';
            }
            if ($detailProduct['giaGiam'] != 0 && (strtotime($detailProduct['ngayHetHanGiam']) > strtotime(date('Y-m-d')))) {
                $price = ($detailProduct['giaTien'] - ($detailProduct['giaTien'] * ($detailProduct['giaGiam'] / 100)));
            } else {
                $price = $detailProduct['giaTien'];
            }
            ?>
            <img src="<?= $imgProduct ?>" alt="">
            <div class="ssss">
                <h2>
                    <?php echo $detailProduct['tenSanPham']; ?>
                </h2>
                <?php if ($price != $detailProduct['giaTien']) { ?>
                    <div class="sss" style="padding:0; color:black;">
                        <span
                            style="text-decoration: line-through;"><?php echo number_format($detailProduct['giaTien'], 0, '.', '.'); ?></span><span
                            id="vnd">&#8363;</span>(-<?= $detailProduct['giaGiam'] ?>%)
                    </div>
                <?php } ?>
                <div class="sss">
                    <?php echo number_format($price, 0, '.', '.'); ?><span id="vnd">&#8363;</span>
                </div>
                <div>Tình trạng :
                    <?php if ($detailProduct['soLuong'] > 0) { ?> <b style="color: green">Còn hàng</b>
                    <?php } else { ?> <b style="color: red">Hết hàng</b>
                    <?php } ?>
                </div>
                <div>Khung giờ vàng nhiều ưu đãi hấp dấn (Mua laptop tặng balo kèm túi chống sốc!)</div>
                <form action="" method="post">
                    <input type="hidden" name="tensanpham" value="<?= $detailProduct['tenSanPham'] ?>">
                    <input type="hidden" name="giasanpham" value="<?= $price ?>">
                    <input type="hidden" name="hinhanh" value="<?= $detailProduct['hinhAnh'] ?>">
                    <button class="button-buy" <?php if ($detailProduct['soLuong'] <= 0) {
                        echo ' disabled style="background-color: gray; width: 400px;"';
                    } else {
                        echo 'style="background-color: #ff9a00; width: 400px; cursor: pointer;"';
                    } ?> id="button-buy-now" type="submit" name="addtocart">Đặt
                        mua
                        ngay</button>
                </form>
            </div>
        </div>
        </form>

    </div>
    <div class="content">
        <div class="motasp">
            <h1>MÔ TẢ SẢN PHẨM</h1>
            <div class="ttmota">
                <?php echo $detailProduct['moTa']; ?>
            </div>
        </div>
    </div>

    <div class="category-group">
        <?php
        $loopCount = 0; // Biến đếm số vòng lặp
        foreach ($listProduct as $key => $value) {
            if ($loopCount >= 4) {
                break; // Thoát khỏi vòng lặp nếu đã đạt đủ 5 lần
            }
            extract($value);
            $maSanPham1 = $maSanPham;
            $linkProduct = "index.php?page=details-product&id=" . $maSanPham1;
            $imgProduct = "./img/Product/" . $hinhAnh . "";
            if ($giaGiam != 0 && (strtotime($ngayHetHanGiam) > strtotime(date('Y-m-d')))) {
                $price = ($giaTien - ($giaTien * ($giaGiam / 100)));
            } else {
                $price = $giaTien;
            }
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
                        <div class="sold">Đã bán:
                            <?= ceil($arrayProductFlashSaleSold[$maSanPham1]['sum(soLuong)']) ?>
                        </div>
                    </div>
                </div>
            </a>
            <?php
            $loopCount++; 
        }
        ?>
    </div>
</div>