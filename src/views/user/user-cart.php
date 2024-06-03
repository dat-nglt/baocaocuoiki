<div class="list-menuBack">
    <div class="content-menuBack">
        <a href="index.php"><i class="fa-solid fa-house" style="margin-right: 5px;"></i> Trang chủ</a>
        <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
        <span style="padding: 0px">Giỏ hàng</span>
    </div>
</div>

<div class="container user-cart">
    <div class="sale-prodoct-header">
        <div id="title">
            Giỏ hàng
        </div>
    </div>
    <div style="padding: 20px;">
        <div class="product-cart">
            <?php
            if (count($_SESSION['cart']) < 1) { ?>
                <div id="meme">Bạn chưa thêm bất kì sản phẩm nào!</div>
            <?php } else {
                foreach ($_SESSION['cart'] as $key => $value) {
                    ?>
                    <div class="detail-product-cart">
                        <img src="<?= $value[2] ?>" alt="">
                        <div class="info-product">
                            <div class="info-product-name">
                                <?= $value[1] ?>
                            </div>
                        </div>
                        <div class="price-amount-product">
                            <div class="price">
                                <?= number_format($value[5], 0, '.', '.') ?><span id="vnd">&#8363;</span>
                            </div>
                            <div class="amount">
                                <form action="" method="post">
                                    <input type="hidden" value="<?= $value[4] ?>" name="changepricecart">
                                    <input type="hidden" value="<?= $value[0] ?>" name="changequantitycart">
                                    <button <?php if ($value[3] == 1)
                                        echo 'disabled'; ?> class="buttonSubmit" name="minusCount"
                                        type="submit"><i class="fa-solid fa-minus"></i></button>
                                </form>
                                <span>
                                    <?= $value[3] ?>
                                </span>
                                <form action="" method="post">
                                    <input type="hidden" value="<?= $value[4] ?>" name="changepricecart1">
                                    <input type="hidden" value="<?= $value[0] ?>" name="changequantitycart1">
                                    <button <?php if ($countProduct[$value[0]] == 0)
                                        echo 'disabled'; ?> class="buttonSubmit"
                                        name="plusCount" type="submit"><i class="fa-solid fa-plus"></i></button>
                                </form>
                            </div>
                            <form action="" method="post">
                                <input type="hidden" value="<?= $value[0] ?>" name="id-delete">
                                <button class="buttonSubmit" name="delete-cart" type="submit"><i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
        <div class="button-box">
            <a class="button-buy continue" href="index.php?page=allproduct">Tiếp tục mua hàng</a>
            <?php if (count($_SESSION['cart']) > 0) { ?>
                <a class="button-buy buyCart" href="index.php?page=orderinfo">Đặt hàng</a>
            <?php } ?>
        </div>
    </div>
</div>