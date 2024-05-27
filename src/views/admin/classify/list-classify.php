<div class="body__container">
    <div class="list__container">
        <div>
            <div style="flex: 1;display:flex;justify-content: space-between">
                <div>
                    <span>Danh sách thương hiệu</span><button onclick="openFormAdd()" id="list__add-btn" type="button">Thêm
                        thương hiệu</button>
                </div>
                <div style="display:flex; gap: 5px; justify-content: center; padding: 0 0 5px;align-items: center;">
                    <fieldset>
                        <legend>Tìm kiếm</legend>
                        <form action="" method="post" class="admin__form-search">
                            <input type="text" name="search-classify" placeholder="Tên thương hiệu" autocomplete="off">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </fieldset>
                    <fieldset>
                        <legend>Sắp xếp</legend>
                        <form action="" method="post" class="admin__form-search">
                            <select name="sort-classify" id="">
                                <option value="desc" <?php if ($_SESSION['sort-classify'] === 'desc')
                                    echo 'selected' ?>>
                                        Mới nhất
                                    </option>
                                    <option value="asc" <?php if ($_SESSION['sort-classify'] === 'asc')
                                    echo 'selected' ?>>Cũ
                                        nhất
                                    </option>
                                </select>
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
            <table>
                <tr>
                    <th style="width: 8%;">#</th>
                    <th style="width: 65%;">Tên thương hiệu</th>
                    <th style="width: 8%;">Hình ảnh</th>
                    <th style="width: 14%;">Số lượng sản phẩm</th>
                    <th style="width: 5%;"></th>
                </tr>
                <?php
                                $stt = (($current_page - 1) * $limitPage) + 1;
                                foreach ($dataClassify as $key => $value) {
                                    extract($value)
                                        ?>
                <tr class="list__content">
                    <td><?= $stt ?></td>
                    <td>
                        <div class="list__hidden-text" style="-webkit-line-clamp: 2;"><?= $tenLoai ?></div>
                    </td>
                    <td>
                        <div style="display: flex; align-items: center; justify-content: center">                         
                            <img style="height: 80px; width: 80px" src="<?= $anhLoai ?>" alt="<?= $tenLoai ?>">
                        </div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $ClassifyCount[$maLoai]['count(maLoai)'] ?></div>
                    </td>
                    <td>
                        <div>
                            <button class="list__action-open-edit" type="button" data-id="<?= $maLoai ?>"><i
                                title="Chỉnh sửa sản phẩm" class="fa-solid fa-pen-to-square list__icon-edit"></i></button>
                            </button>
                            <button class="list__action-btn" type="button" data-id="<?= $maLoai ?>"><i
                                title="Xóa sản phẩm" class="fa-solid fa-trash list__icon-del"></i></button>
                    </td>
                </tr>
                <?php $stt++; } ?>
        </table>
        <div class="list__paging">
            <div>
                <?php
                if ($total_page > 1) {
                    if ($current_page > 3) {
                        echo '<a href="index.php?page=listclassify&pageNumber=1"> <button><i class="fa-solid fa-angles-left"></i></button></a>';
                    }
                    if ($current_page > 1) {
                        echo ' <a href="index.php?page=listclassify&pageNumber=' . ($current_page - 1) . '"><button><i class="fa-solid fa-angle-left"></i></button></a>';
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i != $current_page) {
                            if ($i > $current_page - 3 && $i < $current_page + 3) {
                                echo '<a href="index.php?page=listclassify&pageNumber=' . $i . '"><button class="button">' . $i . '</button></a>';
                            }
                        } else {
                            echo '<a href="index.php?page=listclassify&pageNumber=' . $i . '" class="button-current"><button class="button" >' . $i . '</button></a>';
                        }
                    }
                    if ($current_page < $total_page) {
                        echo '<a href="index.php?page=listclassify&pageNumber=' . ($current_page + 1) . '"> <button><i class="fa-solid fa-angle-right"></i></button></a>';
                    }
                    if ($current_page < $total_page - 2) {
                        echo '<a href="index.php?page=listclassify&pageNumber=' . ($total_page) . '"><button><i class="fa-solid fa-angles-right"></i></button></a>';
                    }
                }
                ?>
            </div>

            <?php if ($_SESSION['search-classify'] != '') { ?>
                <span>Từ khóa đã tìm kiếm: <span><?= $_SESSION['search-classify'] ?></span></span>
            <?php } ?>
        </div>
    </div>
    <script src="../src/js/admin/category/openFormAdd.js"></script>
    <script src="../src/js/admin/closeFormAdd.js"></script>
    <script src="../src/js/admin/category/openFormEdit.js"></script>
    <script src="../src/js/admin/category/deleteItem.js"></script>
    <script src="../src/js/admin/category/changeImg.js"></script>
    <script src="../src/js/admin/category/addCategory.js"></script>
    <script src="../src/js/admin/category/editCategory.js"></script>