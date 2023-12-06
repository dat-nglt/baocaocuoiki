<div class="container detail-product main">
    <div class="list-menu">
        <a href="index.php">Z3G</a>
        <span class="separator"> > </span>
        <a href="index.php?page=category-product&id=<?= $detailProduct['maLoai'] ?>">
            <?php echo $detailProduct['tenLoai']; ?>
        </a>
        <span class="separator"> > </span>
        <span style="font-size: 16px;">
            <?php echo $detailProduct['tenSanPham']; ?>
        </span>
    </div>
    <div class="content">
        <div class="s">
            <?php if ($detailProduct['hinhAnh'] != '') {
                $imgProduct = '../src/img/Product/' . $detailProduct['hinhAnh'] . '';
            } else {
                $imgProduct = '../src/img/Product/giay-mlb-liner-mid-monogram-ny';
            }
            if($detailProduct['giaGiam']!=0 && (strtotime($detailProduct['ngayHetHanGiam']) > strtotime(date('Y-m-d')))){
                $price = ($detailProduct['giaTien'] - ($detailProduct['giaTien']*($detailProduct['giaGiam']/100))) ; 
            }else{
                $price = $detailProduct['giaTien'];
            }
             ?>
            <img src="<?= $imgProduct ?>" alt="">
            <div class="ssss">
                <h2>
                    <?php echo $detailProduct['tenSanPham']; ?>
                </h2>
                <?php if($price != $detailProduct['giaTien']){?>
                    <div class="sss" style="padding:0; color:black;">
                    <span style="text-decoration: line-through;"><?php  echo number_format($detailProduct['giaTien'], 0, '.', '.') ; ?></span><span id="vnd">&#8363;</span>(-<?=$detailProduct['giaGiam']?>%)
                </div>
                <?php } ?>
                <div class="sss">
                    <?php echo number_format($price, 0, '.', '.') ; ?><span id="vnd">&#8363;</span>
                </div>
                <div>Tình trạng :
                    <?php if ($detailProduct['soLuong'] > 0) { ?> <b style="color: green">Còn hàng</b>
                    <?php } else { ?> <b style="color: red">Hết hàng</b>
                    <?php } ?>
                </div>
                <div>Khung giờ vàng nhiều ưu đãi hấp dấn (Mua laptop tặng balo kèm túi chống sốc!)</div>
                <form action="" method="post">
                    <input type="hidden" name="tensanpham" value="<?= $detailProduct['tenSanPham'] ?>">
                    <input type="hidden" name="giasanpham" value="<?=$price ?>">
                    <input type="hidden" name="hinhanh" value="<?= $detailProduct['hinhAnh'] ?>">
                    <button class="button-buy" <?php if($detailProduct['soLuong']<=0){echo ' disabled style="background-color: gray; width: 400px;"';}else { echo 'style="background-color: #ff9a00; width: 400px; cursor: pointer;"';}?> id="button-buy-now" type="submit" name="addtocart">Đặt mua ngay</button>
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
</div>