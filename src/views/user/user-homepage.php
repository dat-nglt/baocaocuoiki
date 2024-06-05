<div class="homepage main">
    <!-- Banner -->
    <div class="container banner-header">
        <a href="http://localhost/baocaocuoiki/src/index.php?page=category-product&id=<?= $dataBanner[0][3] ?>"><img
                id="banner-1" src="<?= $dataBanner[0][1] ?>" alt=""></a>
        <a href="index.php?page=details-product&id=<?= $dataBanner[1][2] ?>"><img id="banner-2"
                src="<?= $dataBanner[1][1] ?>" alt=""></a>
    </div>
    <!-- Phân loại Giày -->
    <div class="container filter">
        <?php foreach ($listClassify as $key => $value) {
            extract($value);
            $linkClassify = "index.php?page=category-product&id=" . $maLoai;
            ?>
            <a href="<?= $linkClassify ?>">
                <div class="filter-item"><img class="scale-item" src="<?= $anhLoai ?>" alt=""><?= $tenLoai ?></div>
            </a>
        <?php } ?>
    </div>
    <!-- Các sản phẩm giảm giá -->
    <?php
    if (!empty($arrayProductFlashSale)) {
        ?>
        <div class="sale-product">
            <div class="sale-prodoct-header">
                <div id="title">Flash Sale <i class="fa-solid fa-weight-scale fa-bounce"
                        style="color: #fff; font-size: 2rem; margin-left: 10px; margin-bottom: 2px;"></i></div>
                <a href="index.php?page=flashsale" id="more-product">Xem tất cả...</a>
            </div>
            <div class="sale-product-content slider">
                <?php foreach ($arrayProductFlashSale as $key => $value) {
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
                                <div class="time-sale-box"> <?= $arrayProductFlashSaleTime[$maSanPham1] ?></div>
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
        <?php
    }
    ?>
    <!-- Sản phẩm bán chạy -->
    <?php
    if ($listProductHot->num_rows > 0) {
        ?>
        <div class="sale-product">
            <div class="sale-prodoct-header">
                <div id="title">Sản phẩm bán chạy <i class="fa-solid fa-fire-flame-curved fa-fade"
                        style="color: #fff; font-size: 2rem; margin-left: 10px; margin-bottom: 2px;"></i></div>
                <a href="index.php?page=hotproduct" id="more-product">Xem tất cả...</a>
            </div>
            <div class="sale-product-content slider">
                <?php foreach ($listProductHot as $key => $value) {
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
                <?php } ?>
            </div>
        </div>
        <?php
    }
    ?>
    <!-- Danh sách sản phẩm -->
    <div class="sale-product">
        <div class="sale-prodoct-header">
            <div id="title">Sản phẩm mới <i class="fa-solid fa-star fa-bounce"
                    style="color: #fff; font-size: 2rem; margin-left: 10px; margin-bottom: 2px;"></i></div>
            <a href="index.php?page=allproduct" id="more-product">Xem tất cả...</a>
        </div>
        <div class="sale-product-content">
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
                        <button type="button" class="add-to-cart" data-id="<?= $maSanPham1 ?>" data-price="<?= $price ?>">Thêm
                            vào giỏ</button>
                    <?php } else { ?>
                        <button type="button" class="out-count" disabled>Đã hết hàng</button>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="./js/homepage.js"></script>
<!-- <script src="./js/addToCart.js"></script> -->
<script>
    $(document).ready(function () {
        $(".add-to-cart").click(function () {
            var productDiv = $(this).closest('.product');
            var nameProduct = productDiv.find('.name-product').text();
            var imgProduct = productDiv.find('.imgProduct').attr('src');
            var idProduct = $(this).data("id");
            var priceProduct = $(this).data("price");

            $.ajax({
                type: "POST",
                url: "./services/addToCart.php",
                dataType: "json",
                data: {
                    maSanPham: idProduct,
                    tenSanPham: nameProduct,
                    hinhAnh: imgProduct,
                    giaTien: priceProduct,
                },
                success: function (result) {
                    var newCart = result.data;
                    sessionStorage.setItem('countCart', newCart);
                    $('#count-cart').text(sessionStorage.getItem('countCart'));
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Thêm sản phẩm vào giỏ"
                    })
                },
                error: function (xhr, error) {
                    console.log(xhr);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "error",
                        title: "Thêm sản phẩm thất bại"
                    });
                    return;
                },

            });
        });
    });
</script>

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