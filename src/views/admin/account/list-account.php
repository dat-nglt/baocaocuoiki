<div class="container-form">
    <form action="index.php?page=listaccounts" method="post">
        <input type="text" name="search-input-account" id="">
        <button type="submit" name="search-submit-account"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <form action="index.php?page=listaccounts" method="post">
        <select id="select-sort" name="sort-select-account">
            <option <?php if ($_SESSION['sort-account'] === 'desc')
                echo 'selected'; ?> value="desc">Mới Nhất</option>
            <option <?php if ($_SESSION['sort-account'] === 'asc')
                echo 'selected'; ?> value="asc">Cũ Nhất</option>
            <option <?php if ($_SESSION['sort-account'] === '0')
                echo 'selected'; ?> value="0">Tài Khoản Bị Vô Hiệu Hoá
            </option>
            <option <?php if ($_SESSION['sort-account'] === '1')
                echo 'selected'; ?> value="1">Tài Khoản Khả Dụng</option>
        </select>
        <button type="submit" name="sort-submit-account"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
<?php if ($total_page > 1) { ?>
    <div class="page-number">


        <?php if ($current_page > 3) { //Từ trang thứ 4 (trang số 1 bị ẩn) thì hiển thị kí hiệu "Trang đầu" sẽ được hiển thị?>
            <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=1"><i
                    class="fa-solid fa-backward-fast"></i></a>
        <?php } ?>



        <?php if ($current_page > 1) { //Nếu trang hiện tại không phải là trang đầu tiền thì hiển thị icon để tải lại trang trước đó?>
            <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $current_page - 1 ?>"><i
                    class="fa-solid fa-angle-left"></i></a>
        <?php }
        ?>



        <?php for ($index = 1; $index <= $total_page; $index++) {
            if ($current_page == $index) { //thiết lập điều kiện là trang hiện tại đã được chọn thì không chứa liên kết?>

                <strong>
                    <?= $index ?>
                </strong>

            <?php } else { //thiết lập điều kiện là trang chưa được chọn thì sẽ chứa liên kết
                if ($current_page == $total_page) { // Nếu là trang cuối thì hiện thêm 4 trang trước đó
                    if ($index > ($current_page - 5)) { ?>
                        <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $index ?>">
                            <?= $index ?>
                        </a>
                        <?php
                    }
                } else if ($current_page == 1) { // Nếu là trang đầu thì hiện thêm 4 trang sau đó
                    if ($index < ($current_page + 5)) { ?>
                            <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $index ?>">
                            <?= $index ?>
                            </a>
                        <?php
                    }

                } else if ($current_page == 2) { // Nếu là thứ 2 thì hiện thêm 3 trang sau đó và 1 trang trước đó
                    if ($index < ($current_page + 4)) { ?>
                                <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $index ?>">
                            <?= $index ?>
                                </a>
                        <?php
                    }
                    ?>
                    <?php
                } else if ($current_page == $total_page - 1) { // Nếu là kế cuối thì hiện thêm 3 trang trước đó và 1 trang sau đó
                    if ($index > ($current_page - 4)) { ?>
                                    <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $index ?>">
                            <?= $index ?>
                                    </a>
                        <?php
                    } ?>

                <?php } else if ($index > ($current_page - 3) && $index < ($current_page + 3)) { //Nếu là trang ở giữa, thì hiện 2 trang trước đó và 2 trang sau đó?>
                                    <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $index ?>">
                        <?= $index ?>
                                    </a>
                <?php } ?>
            <?php }
        } ?>



        <?php if ($total_page > 1 && $current_page < $total_page) { //nếu tổng số trang lớn hơn 1 và trang hiện tại không phải là trang cuối cùng thì hiện ra icon để tải trang tiếp theo ?>
            <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $current_page + 1 ?>"><i
                    class="fa-solid fa-angle-right"></i></a>

        <?php } ?>
    </div>
<?php } ?>
<table class="table-account">
    <tr>
        <th style="width: 10%">Mã Người Dùng</th>
        <th style="width: 25%">Tên Người Dùng</th>
        <th style="width: 10%">Số Điện Thoại</th>
        <th style="width: 20%">Email</th>
        <th style="width: 10%">Ngày đăng ký</th>
        <th style="width: 10%">Tuỳ chọn</th>
    </tr>
    <?php

    foreach ($dataAccount as $key => $value) {
        extract($value);
        $edit = "index.php?page=detailAccount&&id=".$maNguoiDung;
        $date = date('d-m-Y', strtotime($ngayThamGia));
        ?>
        <tr>
            <td>
                <?= $maNguoiDung ?>
            </td>
            <td>
                <?= $tenNguoiDung ?>
            </td>
            <td>
                <?= $soDienThoai ?>
            </td>
            <td>
                <?= $email ?>
            </td>
            <td>
                <?= $date ?>
            </td>
            <td class="edit">
                <a href="<?=$edit?>"><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
        </tr>
    <?php }

    ?>

</table>