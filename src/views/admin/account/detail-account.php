<div class="admin-title">Chi Tiết Người Dùng</div>
<div class="info-user">
    <img class="info-avatar" src="../src/img/user/user.jpg" alt="">
    <div class="info-detail">
        <div class="info-field id">
            Mã Người Dùng: <span>
                <?= $detailUser['maNguoiDung'] ?>
            </span>
        </div>
        <div class="info-field username">
            Tên Tài Khoản: <span>
                <?= $detailUser['tenTaiKhoan'] ?>
            </span>
        </div>
        <div class="info-field name">
            Họ Tên Người Dùng: <span>
                <?= $detailUser['tenNguoiDung'] ?>
            </span>
        </div>
        <div class="info-field address">
            Địa Chỉ Người Dùng: <span>
                <?= $detailUser['diaChi'] ?>
            </span>
        </div>
        <div class="info-field phone-number">
            Số Điện Thoại: <span>
                <?= $detailUser['soDienThoai'] ?>
            </span>
        </div>
        <div class="info-field email">
            Email: <span>
                <?= $detailUser['email'] ?>
            </span>
        </div>
        <form action="" method="POST">
            <?php if ($detailUser['quyenTruyCap'] === '1') { ?>
                <input type="hidden" value="0" name="role">
                <button name="lock" id="buttonLock" type="submit" style="background-color: rgb(255, 0, 0);">Vô Hiệu Hoá Tài
                    Khoản</button>
            <?php } else { ?>
                <input type="hidden" value="1" name="role">
                <button name="unLock" id="buttonUnlock" type="submit" style="background-color: rgb(22, 115, 168);">Mở Khoá
                    Tài Khoản</button>
            <?php } ?>
        </form>
    </div>
</div>