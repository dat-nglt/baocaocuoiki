<div class="body__container">
    <div class="list__container">
        <div>
            <div style="flex: 1;display:flex;justify-content: space-between">
                <div>
                    <span>Danh sách đơn hàng</span>
                    <!-- <button onclick="openFormAdd()" id="list__add-btn"
                        type="button">Thêm
                        tài khoản</button> -->
                </div>
                <div style="display:flex; gap: 5px; justify-content: center; padding: 0 0 5px;align-items: center;">
                    <fieldset>
                        <legend>Tìm kiếm</legend>
                        <form action="" method="post" class="admin__form-search">
                            <input type="text" name="search-order" placeholder="Tên người dùng" autocomplete="off">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </fieldset>
                    <!-- <fieldset>
                        <legend>Trạng thái đơn hàng</legend>
                        <form action="" method="post" class="admin__form-search">
                            <select name="sort-order" id="">
                                <option value="0" <?php if ($_SESSION['sort-order-status'] === '0')
                                    echo 'selected' ?>>
                                        Chờ xác nhận
                                    </option>
                                    <option value="1" <?php if ($_SESSION['sort-order-status'] === '1')
                                    echo 'selected' ?>>Đã xác nhận
                                    </option>
                                    <option value="2" <?php if ($_SESSION['sort-order-status'] === '2')
                                    echo 'selected' ?>>
                                        Đang giao hàng
                                    </option>
                                    <option value="3" <?php if ($_SESSION['sort-order-status'] === '3')
                                    echo 'selected' ?>>
                                        Giao thành công
                                    </option>
                                    <option value="4" <?php if ($_SESSION['sort-order-status'] === '4')
                                    echo 'selected' ?>>
                                        Giao thất bại
                                    </option>
                                </select>
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </fieldset> -->
                        <fieldset>
                            <legend>Sắp xếp</legend>
                            <form action="" method="post" class="admin__form-search">
                                <select name="sort-order" id="">
                                    <option value="desc" <?php if ($_SESSION['sort-order'] === 'desc')
                                    echo 'selected' ?>>
                                        Mới nhất
                                    </option>
                                    <option value="asc" <?php if ($_SESSION['sort-order'] === 'asc')
                                    echo 'selected' ?>>Cũ
                                        nhất
                                    </option>
                                    <option value="asc1" <?php if ($_SESSION['sort-order'] === 'asc1')
                                    echo 'selected' ?>>
                                        Tổng tiền tăng dần
                                    </option>
                                    <option value="desc1" <?php if ($_SESSION['sort-order'] === 'desc1')
                                    echo 'selected' ?>>
                                        Tổng tiền giảm dần
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
                    <th style="width: 5%;">#</th>
                    <th style="width: 22%;">Tên người dùng</th>
                    <th style="width: 11%;">Số lượng sản phẩm</th>
                    <th style="width: 15%;">Thành tiền</th>
                    <th style="width: 8%;">Thời gian mua</th>
                    <th style="width: 21%;">Ghi chú</th>
                    <th style="width: 13%;">Trạng thái</th>
                    <th style="width: 5%;"></th>
                </tr>
                <?php
                                $stt = (($current_page - 1) * $limitPage) + 1;
                                foreach ($dataOrder as $key => $value) {
                                    extract($value);
                                    switch ($trangThai) {
                                        case '0':
                                            $status = "Chờ xác nhận";
                                            break;
                                        case '1':
                                            $status = "Đã xác nhận";
                                            break;
                                        case '2':
                                            $status = "Đang giao hàng";
                                            break;
                                        case '3':
                                            $status = "Đơn hàng thành công";
                                            break;
                                        case '4':
                                            $status = "Đơn hàng thất bại";
                                            break;
                                        default:
                                            $status = '';
                                            break;
                                    }
                                    ?>
                <tr class="list__content">
                    <td><?= $stt ?></td>
                    <td>
                        <div class="list__hidden-text"><?= $tenTaiKhoan ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $count ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= number_format($thanhTien, 0, '.', '.') ?><span id="vnd"
                                style="font-weight: 500; font-size: 17px;">&#8363;</span></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= date("d-m-Y", strtotime($thoiGian)) ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $ghiChu ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $status ?></div>
                    </td>
                    <td>
                        <div>
                            <a href="index.php?page=detailbill&id=<?= $maDonHang ?>"><button class="list__action-open-edit"
                                    type="button"><i class="fa-solid fa-eye list__icon-edit"></i></button></a>
                            <!-- <button class="list__action-btn" type="button" data-id="<?= $maDonHang ?>"><i
                                title="Xóa sản phẩm" class="fa-solid fa-trash list__icon-del"></i></button> -->
                        </div>
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
                        echo '<a href="index.php?page=listbills&pageNumber=1"> <button><i class="fa-solid fa-angles-left"></i></button></a>';
                    }
                    if ($current_page > 1) {
                        echo ' <a href="index.php?page=listbills&pageNumber=' . ($current_page - 1) . '"><button><i class="fa-solid fa-angle-left"></i></button></a>';
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i != $current_page) {
                            if ($i > $current_page - 3 && $i < $current_page + 3) {
                                echo '<a href="index.php?page=listbills&pageNumber=' . $i . '"><button class="button">' . $i . '</button></a>';
                            }
                        } else {
                            echo '<a href="index.php?page=listbills&pageNumber=' . $i . '" class="button-current"><button class="button" >' . $i . '</button></a>';
                        }
                    }
                    if ($current_page < $total_page) {
                        echo '<a href="index.php?page=listbills&pageNumber=' . ($current_page + 1) . '"> <button><i class="fa-solid fa-angle-right"></i></button></a>';
                    }
                    if ($current_page < $total_page - 2) {
                        echo '<a href="index.php?page=listbills&pageNumber=' . ($total_page) . '"><button><i class="fa-solid fa-angles-right"></i></button></a>';
                    }
                }
                ?>
            </div>

            <?php if ($_SESSION['search-order'] != '') { ?>
                <span>Từ khóa đã tìm kiếm: <span><?= $_SESSION['search-order'] ?></span></span>
            <?php } ?>
        </div>
    </div>
</div>
<script src="../src/js/admin/order/delOrder.js"></script>