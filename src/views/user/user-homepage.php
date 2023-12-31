<div class="homepage main">
    <!-- Banner -->
    <div class="container banner-header">
        <a href=""><img id="banner-1" src="./img/Product/Banner1.png" alt=""></a>
        <a href=""><img id="banner-2" src="./img/Product/Banner2.png" alt=""></a>
    </div>
    <!-- Phân loại Giày -->
    <div class="container filter">
        <?php foreach ($listClassify as $key => $value) {
            extract($value);
            $imgClassify = "./img/phanLoai/".$anhLoai."";
            $linkClassify = "index.php?page=category-product&id=".$maLoai;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
        ?>
        <a href="<?=$linkClassify?>">
            <div class="filter-item"><img class="scale-item" src="<?=$imgClassify?>" alt=""><?=$tenLoai?></div>
        </a>
    <?php }?>   
    </div>
    <!-- Các sản phẩm giảm giá -->
    <div class="sale-product">
        <div class="sale-prodoct-header">
            <div id="title">Flash Sale Trong Tuần <i class="fa-solid fa-weight-scale fa-bounce"
                    style="color: #fff; font-size: 2rem; margin-left: 10px"></i></div>
            <div id="time"></div>
        </div>
        <div class="sale-product-content">
            <?php foreach ($arrayProductFlashSale as $key => $value) {
                extract($value);
                $maSanPham1 = $maSanPham;
                $linkProduct = "index.php?page=details-product&id=".$maSanPham1;
                $imgProduct = "./img/Product/".$hinhAnh."";
                $price = ($giaTien - ($giaTien*($giaGiam/100))) ; 
                ?>
                <a href="<?=$linkProduct?>">
                <div class="product scale-item">
                    <img src="<?=$imgProduct?>" alt="">
                    <div class="info-product">
                        <div class="name-product"><?=$tenSanPham?></div>
                        <div class="price-product"><?=number_format($price, 0, '.', '.') ?><span id="vnd">&#8363;</span></div>
                        <div class="sold">Đã bán:<?=ceil($arrayProductFlashSaleSold[$maSanPham1]['sum(soLuong)'])?></div>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>
    <!-- Danh sách sản phẩm -->
    <div class="sale-product">
        <div class="sale-prodoct-header">
            <div id="title">Danh sách sản phẩm</div>
            <a href="index.php?page=allproduct" id="more-product">Xem tất cả sản phẩm</a>
        </div>
        <div class="sale-product-content">
            <?php foreach ($listProduct as $key => $value) {
                extract($value);
                $maSanPham1 = $maSanPham;
                $linkProduct = "index.php?page=details-product&id=".$maSanPham1;
                $imgProduct = "./img/Product/".$hinhAnh."";
                $price = ($giaTien - ($giaTien*($giaGiam/100))) ; 
                ?>
                <a href="<?=$linkProduct?>">
                <div class="product scale-item">
                    <img src="<?=$imgProduct?>" alt="">
                    <div class="info-product">
                        <div class="name-product"><?=$tenSanPham?></div>
                        <div class="price-product"><?=number_format($price, 0, '.', '.') ?><span id="vnd">&#8363;</span></div>
                        <div class="sold">Đã bán:<?=ceil($arrayProductFlashSaleSold[$maSanPham1]['sum(soLuong)'])?></div>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>
</div>
<script src="./js/homepage.js"></script>