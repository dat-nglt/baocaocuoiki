<div class="body__container">
    <div class="list__container">
        <div style="flex: 1;display:flex;justify-content: space-between">
            <div>
                <span>Danh sách sản phẩm</span><button onclick="openFormAdd()" id="list__add-btn" type="button">Thêm
                    sản phẩm</button>
            </div>
            <div style="display:flex; gap: 5px; justify-content: center; padding: 0 0 5px;align-items: center;">
                <fieldset>
                    <legend>Tìm kiếm</legend>
                    <form action="" method="post" class="admin__form-search">
                        <input type="text" name="search-product" placeholder="Tên sản phẩm" autocomplete="off">
                        <select name="sort-classify-product" id="sort-classify-product">
                            <option value="0" <?php if ($_SESSION['sort-classify-product'] === '0')
                                echo 'selected' ?>>
                                    Tất cả
                                </option>
                            <?php foreach ($listNameClassify as $key => $value) {
                                extract($value)
                                    ?>
                                <option value="<?= $maLoai ?>" <?php if ($_SESSION['sort-classify-product'] === $maLoai)
                                      echo 'selected' ?>>
                                    <?= $tenLoai ?>
                                </option>
                            <?php } ?>
                        </select>
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </fieldset>
                <fieldset>
                    <legend>Sắp xếp</legend>
                    <form action="" method="post" class="admin__form-search">
                        <select name="sort-product" id="">
                            <option value="desc" <?php if ($_SESSION['sort-product'] === 'desc')
                                echo 'selected' ?>>
                                    Mới nhất
                                </option>
                                <option value="asc" <?php if ($_SESSION['sort-product'] === 'asc')
                                echo 'selected' ?>>Cũ
                                    nhất
                                </option>
                                <option value="0" <?php if ($_SESSION['sort-product'] === '0')
                                echo 'selected' ?>>Giá tăng dần
                                </option>
                                <option value="1" <?php if ($_SESSION['sort-product'] === '1')
                                echo 'selected' ?>>Giá giảm dần
                                </option>
                            </select>
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </fieldset>
                </div>
            </div>
            <table>
                <tr>
                    <th style="width: 3%;">#</th>
                    <th style="width: 30%;">Tên sản phẩm</th>
                    <th style="width: 8%;">Giá tiền <br>(VNĐ)</th>
                    <th style="width: 10%;">Hình ảnh</th>
                    <th style="width: 7%;">Số lượng</th>
                    <th style="width: 6%;">Giảm giá (%)</th>
                    <th style="width: 12%;">Ngày hết hạn giảm</th>
                    <th style="width: 8%;">Thương hiệu</th>
                    <th style="width: 7%;">Hành động</th>
                </tr>
                <?php
                            $stt = (($current_page - 1) * $limitPage) + 1;
                            foreach ($dataProduct as $key => $value) {
                                extract($value)
                                    ?>
                <tr class="list__content">
                    <td><?= $stt ?></td>
                    <td>
                        <div class="list__hidden-text" style="-webkit-line-clamp: 2;"><?= $tenSanPham ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text" style="-webkit-line-clamp: 2;"><?= $giaTien ?></div>
                    </td>
                    <td>
                        <div style="display: flex; align-items: center; justify-content: center">
                            <img style="height: 80px; width: 70px" src="<?= $hinhAnh ?>" alt="<?= $tenSanPham ?>">
                        </div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $soLuong ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $giaGiam ?></div>
                    </td>
                    <td>
                        <?php if ($ngayHetHanGiam != '0000-00-00') { ?>
                            <div class="list__hidden-text"><?= date("d-m-Y", strtotime($ngayHetHanGiam)) ?></div>
                        <?php } else { ?>
                            <div class="list__hidden-text"><?php $ngayHetHanGiam ?></div>
                        <?php } ?>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $tenLoai ?></div>
                    </td>
                    <td>
                        <div>
                            <button class="list__action-open-edit" type="button" data-id="<?= $maSanPham ?>"><i
                                    title="Chỉnh sửa sản phẩm"
                                    class="fa-solid fa-pen-to-square list__icon-edit"></i></button>
                            </button>
                            <button class="list__action-btn" type="button" data-id="<?= $maSanPham ?>"><i
                                    title="Xóa sản phẩm" class="fa-solid fa-trash list__icon-del"></i></button>
                    </td>
                </tr>
                <?php $stt++;
                            } ?>
        </table>
        <div class="list__paging">
            <div>
                <?php
                if ($total_page > 1) {
                    if ($current_page > 3) {
                        echo '<a href="index.php?page=listproducts&pageNumber=1"> <button><i class="fa-solid fa-angles-left"></i></button></a>';
                    }
                    if ($current_page > 1) {
                        echo ' <a href="index.php?page=listproducts&pageNumber=' . ($current_page - 1) . '"><button><i class="fa-solid fa-angle-left"></i></button></a>';
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i != $current_page) {
                            if ($i > $current_page - 3 && $i < $current_page + 3) {
                                echo '<a href="index.php?page=listproducts&pageNumber=' . $i . '"><button class="button">' . $i . '</button></a>';
                            }
                        } else {
                            echo '<a href="index.php?page=listproducts&pageNumber=' . $i . '" class="button-current"><button class="button" >' . $i . '</button></a>';
                        }
                    }
                    if ($current_page < $total_page) {
                        echo '<a href="index.php?page=listproducts&pageNumber=' . ($current_page + 1) . '"> <button><i class="fa-solid fa-angle-right"></i></button></a>';
                    }
                    if ($current_page < $total_page - 2) {
                        echo '<a href="index.php?page=listproducts&pageNumber=' . ($total_page) . '"><button><i class="fa-solid fa-angles-right"></i></button></a>';
                    }
                }
                ?>
            </div>

            <?php if ($_SESSION['search-product'] != '') { ?>
                <span>Từ khóa đã tìm kiếm: <span><?= $_SESSION['search-product'] ?></span></span>
            <?php } ?>
        </div>
    </div>
</div>
<script src="../src/js/admin/product/openFormAdd.js"></script>
<script src="../src/js/admin/closeFormAdd.js"></script>
<script src="../src/js/admin/product/openFormEdit.js"></script>
<script src="../src/js/admin/product/deleteItem.js"></script>
<script src="../src/js/admin/changeImg.js"></script>
<script src="../src/js/admin/product/addProduct.js"></script>
<script src="../src/js/admin/product/editProduct.js"></script>