<div class="container-form">
    <form action="index.php?page=listproducts" method="post">
        <input type="text" name="search-input-product" id="">
        <button type="submit" name="search-submit-product"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <form action="index.php?page=listproducts" method="post">
        <select id="select-sort" name="sort-select-product">
            <option <?php if ($_SESSION['sort-product'] === 'desc')
                echo 'selected'; ?> value="desc">Mới Nhất</option>
            <option <?php if ($_SESSION['sort-product'] === 'asc')
                echo 'selected'; ?> value="asc">Cũ Nhất</option>
            <option <?php if ($_SESSION['sort-product'] === '0')
                echo 'selected'; ?> value="0">Giá Tăng Dần
            </option>
            <option <?php if ($_SESSION['sort-product'] === '1')
                echo 'selected'; ?> value="1">Giá Giảm Dần</option>
        </select>
        <button type="submit" name="sort-submit-product"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <form action="index.php?page=listproducts" method="post">
        <select name="sort-select-classify-product">
            <option <?php if ($_SESSION['sort-classify-product'] === '0')
                echo 'selected'; ?> value="0">Tất cả loại
            </option>
            <?php foreach ($listNameClassify as $key => $value) {
                extract($value); ?>
                <option <?php if ($_SESSION['sort-classify-product'] === $maLoai)
                    echo 'selected'; ?> value="<?= $maLoai ?>">
                    <?= $tenLoai ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit" name="sort-submit-classify-product"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
<div class="page-number">
    <div class="info-field">
        <a href="index.php?page=addProduct"><button id="buttonAdd" style="background-color: midnightblue;">Thêm sản
                phẩm</button></a>
    </div>

</div>
<?php if ($total_page > 1) { ?>
    <div class="page-number">

        <?php if ($current_page > 3) { ?>
            <a class="number-of-page" href="index.php?page=listproducts&pageNumber=1">Trang đầu</a>
        <?php } ?>

        <?php if ($current_page > 1) { ?>
            <a class="number-of-page" href="index.php?page=listproducts&pageNumber=<?= $current_page - 1 ?>"><i
                    class="fa-solid fa-backward-step"></i></a>
        <?php }
        ?>

        <?php for ($index = 1; $index <= $total_page; $index++) {
            if ($current_page == $index) { //thiết lập điều kiện là trang hiện tại đã được chọn thì không chứa liên kết?>

                <strong class="number-of-page">
                    <?= $index ?>
                </strong>

            <?php } else { //thiết lập điều kiện là trang chưa được chọn thì sẽ chứa liên kết
                if ($current_page == $total_page) { // Nếu là trang cuối thì hiện thêm 4 trang trước đó
                    if ($index > ($current_page - 5)) { ?>
                        <a class="number-of-page" href="index.php?page=listproducts&pageNumber=<?= $index ?>">
                            <?= $index ?>
                        </a>
                        <?php
                    }
                } else if ($current_page == 1) { // Nếu là trang đầu thì hiện thêm 4 trang sau đó
                    if ($index < ($current_page + 5)) { ?>
                            <a class="number-of-page" href="index.php?page=listproducts&pageNumber=<?= $index ?>">
                            <?= $index ?>
                            </a>
                        <?php
                    }

                } else if ($current_page == 2) {
                    if ($index < ($current_page + 4)) { ?>
                                <a class="number-of-page" href="index.php?page=listproducts&pageNumber=<?= $index ?>">
                            <?= $index ?>
                                </a>
                        <?php
                    }
                    ?>
                    <?php
                } else if ($current_page == $total_page - 1) {
                    if ($index > ($current_page - 4)) { ?>
                                    <a class="number-of-page" href="index.php?page=listproducts&pageNumber=<?= $index ?>">
                            <?= $index ?>
                                    </a>
                        <?php
                    } ?>

                <?php } else if ($index > ($current_page - 3) && $index < ($current_page + 3)) { ?>
                                    <a class="number-of-page" href="index.php?page=listproducts&pageNumber=<?= $index ?>">
                        <?= $index ?>
                                    </a>
                <?php } ?>
            <?php }
        } ?>
        <?php if ($total_page > 1 && $current_page < $total_page) { ?>
            <a class="number-of-page" href="index.php?page=listproducts&pageNumber=<?= $current_page + 1 ?>"><i
                    class="fa-solid fa-forward-step"></i></a>
        <?php } ?>
    </div>
<?php } ?>
<table class="table-account">
    <tr>
        <th style="width: 5%">Mã Sản Phẩm</th>
        <th style="width: 40%">Tên Sản Phẩm</th>
        <th style="width: 20%">Hình ảnh</th>
        <th style="width: 10%">Giá Đơn Vị</th>
        <th style="width: 8%">Số Lượng</th>
        <th style="width: 10%">Tuỳ Chọn</th>
    </tr>
    <?php
    foreach ($dataProduct as $key => $value) {
        extract($value);
        $edit = "index.php?page=detailProduct&&id1=" . $maSanPham;
        ?>
        <tr>
            <td>
                <?= $maSanPham ?>
            </td>
            <td>
                <?= $tenSanPham ?>
            </td>
            <td>
                <img style="witdh: 100px; height: 100px;" src="../src/img/Product/<?= $hinhAnh ?>" alt="">
            </td>
            <td>
                <?= number_format($giaTien, 0, '.', '.') ?> <span id="vnd">&#8363;</span>
            </td>
            <td>
                <?= $soLuong ?>
            </td>
            <td class="edit">
                <a href="<?= $edit ?>"><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
        </tr>
    <?php }

    ?>
</table>