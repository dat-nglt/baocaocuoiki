<div class="container-form">
    <form action="index.php?page=listbills" method="post">
        <input type="text" name="search-input-order" id="" placeholder="Tìm kiếm">
        <button type="submit" name="search-submit-order"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <form action="index.php?page=listbills" method="post">
        <select id="select-sort" name="sort-select-order">
            <option <?php if ($_SESSION['sort-order'] === 'desc')
                echo 'selected'; ?> value="desc"> Mới Nhất </option>

            <option <?php if ($_SESSION['sort-order'] === 'asc')
                echo 'selected'; ?> value="asc"> Cũ Nhất </option>

            <option <?php if ($_SESSION['sort-order'] === 'asc1')
                echo 'selected'; ?> value="asc1"> Tổng tiền tăng
            </option>

            <option <?php if ($_SESSION['sort-order'] === 'desc1')
                echo 'selected'; ?> value="desc1"> Tổng tiền giảm
            </option>

            <option <?php if ($_SESSION['sort-order'] == 0)
                echo 'selected'; ?> value="0"> Chưa xử lý
            </option>

            <option <?php if ($_SESSION['sort-order'] == 1)
                echo 'selected'; ?> value="1"> Đã duyệt
            </option>

        </select>
        <button type="submit" name="sort-submit-order"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
<?php if ($total_page > 1) { ?>
    <div class="page-number">

        <?php if ($current_page > 3) { ?>
            <a class="number-of-page" href="index.php?page=listbills&pageNumber=1">Trang đầu</a>
        <?php } ?>

        <?php if ($current_page > 1) { ?>
            <a class="number-of-page" href="index.php?page=listbills&pageNumber=<?= $current_page - 1 ?>"><i
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
                        <a class="number-of-page" href="index.php?page=listbills&pageNumber=<?= $index ?>">
                            <?= $index ?>
                        </a>
                        <?php
                    }
                } else if ($current_page == 1) { // Nếu là trang đầu thì hiện thêm 4 trang sau đó
                    if ($index < ($current_page + 5)) { ?>
                            <a class="number-of-page" href="index.php?page=listbills&pageNumber=<?= $index ?>">
                            <?= $index ?>
                            </a>
                        <?php
                    }

                } else if ($current_page == 2) {
                    if ($index < ($current_page + 4)) { ?>
                                <a class="number-of-page" href="index.php?page=listbills&pageNumber=<?= $index ?>">
                            <?= $index ?>
                                </a>
                        <?php
                    }
                    ?>
                    <?php
                } else if ($current_page == $total_page - 1) {
                    if ($index > ($current_page - 4)) { ?>
                                    <a class="number-of-page" href="index.php?page=listbills&pageNumber=<?= $index ?>">
                            <?= $index ?>
                                    </a>
                        <?php
                    } ?>

                <?php } else if ($index > ($current_page - 3) && $index < ($current_page + 3)) { ?>
                                    <a class="number-of-page" href="index.php?page=listbills&pageNumber=<?= $index ?>">
                        <?= $index ?>
                                    </a>
                <?php } ?>
            <?php }
        } ?>
        <?php if ($total_page > 1 && $current_page < $total_page) { ?>
            <a class="number-of-page" href="index.php?page=listbills&pageNumber=<?= $current_page + 1 ?>"><i
                    class="fa-solid fa-forward-step"></i></a>
        <?php } ?>
    </div>
<?php } ?>
<table class="table-account">
    <tr>
        <th style="width: 3%">STT</th>
        <th style="width: 7%">Mã đơn hàng</th>
        <th style="width: 7%">Tên người dùng</th>
        <th style="width: 15%">Thành tiền</th>
        <th style="width: 10%">Ngày đặt hàng</th>
        <th style="width: 10%">Trạng thái</th>
        <th style="width: 10%">Tuỳ chọn</th>
    </tr>

    <?php

    $autoSTT = (($current_page - 1) * $limitPage) + 1;

    foreach ($dataOrder as $key => $value) {
        extract($value) ?>
        <tr>
            <td>
                <?= $autoSTT ?>
            </td>
            <td>
                <?= $maDonHang ?>
            </td>
            <td>
                <?= $tenNguoiDung ?>
            </td>
            <td>
                <?= $formattedAmount = number_format($thanhTien, 0, ',', '.') ?> <span id="vnd">&#8363;</span>
            </td>
            <td>
                <?= $ngayDatFormatted ?>
            </td>
            <td>
                <?php
                if ($trangThai == 0) { ?>
                    <span>Chưa xử lý</span>
                <?php } elseif ($trangThai == 1) { ?>
                    <span>Đã duyệt</span>
                <?php }
                ?>
            </td>
            <td class="edit">
                <a href="index.php?page=detailbill&id=<?= $maDonHang ?>" title='Xem chi tiết'> <i
                        class="fa-solid fa-pen-to-square"></i></a>
                <form style='display: inline;' action="" method='post'
                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
                    <input type="hidden" name='idOrder' value="<?= $maDonHang ?>">
                    <button type='submit' name='del-order' title='Xoá đơn hàng' class="btn-submit" style="background: none; border: none"> <i
                            class="fa-solid fa-delete-left fa-rotate-180"></i> </button>
                </form>
            </td>
        </tr>
        <?php $autoSTT++;
    } ?>
</table>