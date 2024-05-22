<div class="body__container">
    <div class="list__container">
        <div>
            <div style="flex: 1;display:flex;justify-content: space-between">
                <div>
                    <span>Danh sách tài khoản</span>
                    <!-- <button onclick="openFormAdd()" id="list__add-btn"
                        type="button">Thêm
                        tài khoản</button> -->
                </div>
                <div style="display:flex; gap: 5px; justify-content: center; padding: 0 0 5px;align-items: center;">
                    <fieldset>
                        <legend>Tìm kiếm</legend>
                        <form action="" method="post" class="admin__form-search">
                            <input type="text" name="search-account" placeholder="Họ tên, email, số điện thoại"
                                autocomplete="off">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </fieldset>
                    <fieldset>
                        <legend>Sắp xếp</legend>
                        <form action="" method="post" class="admin__form-search">
                            <select name="sort-account" id="">
                                <option value="desc" <?php if ($_SESSION['sort-account'] === 'desc')
                                    echo 'selected' ?>>
                                        Mới nhất
                                    </option>
                                    <option value="asc" <?php if ($_SESSION['sort-account'] === 'asc')
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
                    <th style="width: 5%;">#</th>
                    <th style="width: 16%;">Tên người dùng</th>
                    <th style="width: 13%;">Tên tài khoản</th>
                    <th style="width: 8%;">Địa chỉ</th>
                    <th style="width: 8%;">Số điện thoại</th>
                    <th style="width: 10%;">Email</th>
                    <th style="width: 7%;">Giới tính</th>
                    <th style="width: 8%;">Ngày sinh</th>
                    <th style="width: 9%;">Ngày tham gia</th>
                    <th style="width: 8%;">Trạng thái</th>
                    <th style="width: 8%;"></th>
                </tr>
                <?php
                                $stt = (($current_page - 1) * $limitPage) + 1;
                                foreach ($dataAccount as $key => $value) {
                                    extract($value);
                                    if ($gioiTinh === '1') {
                                        $gender = 'Nam';
                                    } else {
                                        $gender = 'Nữ';
                                    }
                                    if ($quyenTruyCap === '1') {
                                        $status = 'Hữa dụng';
                                    } else {
                                        $status = 'Bị khóa';
                                    }
                                    ?>
                <tr class="list__content">
                    <td><?= $stt ?></td>
                    <td>
                        <div class="list__hidden-text"><?= $tenNguoiDung ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $tenTaiKhoan ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $diaChi ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $soDienThoai ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $email ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $gender ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= date("d-m-Y", strtotime($ngaySinh)) ?></div>
                    </td>


                    <td>
                        <div class="list__hidden-text"><?= date("d-m-Y", strtotime($ngayThamGia)) ?></div>
                    </td>
                    <td>
                        <div class="list__hidden-text"><?= $status ?></div>
                    </td>
                    <td>
                        <div>
                            <button class="list__action-open-edit" type="button" data-id="<?= $maNguoiDung ?>"><i class="fa-solid fa-eye list__icon-edit"></i></button>
                            <button class="list__action-btn" type="button" data-id="<?= $maNguoiDung ?>">
                                <?php if ($quyenTruyCap === '1') {
                                    echo '<i class="fa-solid fa-lock list__icon-del"></i>';
                                } else{
                                    echo '<i class="fa-solid fa-lock-open list__icon-edit"></i>';
                                } ?>
                            </button>
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
                        echo '<a href="index.php?page=listaccounts&pageNumber=1"> <button><i class="fa-solid fa-angles-left"></i></button></a>';
                    }
                    if ($current_page > 1) {
                        echo ' <a href="index.php?page=listaccounts&pageNumber=' . ($current_page - 1) . '"><button><i class="fa-solid fa-angle-left"></i></button></a>';
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i != $current_page) {
                            if ($i > $current_page - 3 && $i < $current_page + 3) {
                                echo '<a href="index.php?page=listaccounts&pageNumber=' . $i . '"><button class="button">' . $i . '</button></a>';
                            }
                        } else {
                            echo '<a href="index.php?page=listaccounts&pageNumber=' . $i . '" class="button-current"><button class="button" >' . $i . '</button></a>';
                        }
                    }
                    if ($current_page < $total_page) {
                        echo '<a href="index.php?page=listaccounts&pageNumber=' . ($current_page + 1) . '"> <button><i class="fa-solid fa-angle-right"></i></button></a>';
                    }
                    if ($current_page < $total_page - 2) {
                        echo '<a href="index.php?page=listaccounts&pageNumber=' . ($total_page) . '"><button><i class="fa-solid fa-angles-right"></i></button></a>';
                    }
                }
                ?>
            </div>

            <?php if ($_SESSION['search-account'] != '') { ?>
                <span>Từ khóa đã tìm kiếm: <span><?= $_SESSION['search-account'] ?></span></span>
            <?php } ?>
        </div>
    </div>
</div>
<!-- <script src="../src/js/admin/account/openFormAdd.js"></script> -->
<!-- <script src="../src/js/admin/showPassword.js"></script> -->
<script src="../src/js/admin/account/openFormEdit.js"></script>
<script src="../src/js/admin/closeFormAdd.js"></script>
<script src="../src/js/admin/account/lockAccount.js"></script>