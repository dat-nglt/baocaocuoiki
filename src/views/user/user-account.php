<div class="container user-account">
    <h1 class="title-form_account">HỒ SƠ NGƯỜI DÙNG</h1>
    <h2 class="title-form_account sub"><span id="info-form-account" class="active">Thông Tin Tài Khoản</span> | <span id="info-password-account">Đổi Mật Khẩu</span></h2>
    <form action="" method="post" id="info-basic-form">
        <div class="info-user-form">
            <input type="hidden" name="pass" value="<?= $_SESSION['user']['matKhau'] ?>">
        <div>
            <div class="info-field-account">
                <label for="">Tên đăng nhập</label>
                <input type="text" required readonly name="user-name" value="<?= $_SESSION['user']['tenTaiKhoan'] ?>">
            </div>
            <div class="info-field-account">
                <label for="">Họ & Tên</label>
                <input type="text" required name="name" value="<?= $_SESSION['user']['tenNguoiDung'] ?>">
            </div>

            <div class="info-field-account">
                <label for="">Email</label>
                <input type="email" required name="email" value="<?= $_SESSION['user']['email'] ?>">
            </div>
            <div class="info-field-account gender">
                <span id='check-sex' for="nam">Giới tính</span>
                <input type="radio" id="nam" value="1" <?php if ($_SESSION['user']['gioiTinh'] == 1)
                    echo 'checked'; ?> required
                    name="check-sex">
                <span for="nu">Nam</span>
                <input type="radio" value="2" id="nu" <?php if ($_SESSION['user']['gioiTinh'] == 2)
                    echo 'checked'; ?> required
                    name="check-sex">
                <span for="">Nữ</span>
                <input type="radio" value="0" <?php if ($_SESSION['user']['gioiTinh'] == 0)
                    echo 'checked'; ?> required
                    name="check-sex">
                <span for="">Khác</span>
            </div>
        </div>
        <divx>
            <div class="info-field-account">
                <label for="">Số điện thoại</label>
                <input type="text" required name="tel" oninput="this.value=this.value.replace(/[^0-9]/g,'')" value="<?= $_SESSION['user']['soDienThoai'] ?>">
            </div>


            <div class="info-field-account">
                <label for="">Địa chỉ</label>
                <input type="text" required name="address" value="<?= $_SESSION['user']['diaChi'] ?>">
            </div>
            <div class="info-field-account">
                <label for="">Ngày sinh</label>
                <input type="date" required name="date" value="<?= $_SESSION['user']['ngaySinh'] ?>">
            </div>
        </divx>
        </div>


        <button id="submit-info-account" type="submit" name="save-profile">Lưu Thông Tin</button>
    </form>
    
    <form action="" method="post" id="info-password-form" style="display:none">
        <div class="info-user-form" style="display:block">
            <div class="info-field-account">
                <label style="min-width:200px">Mật Khẩu Mới</label>
                <input id="password-field" type="password" required name="password-field">
            </div>
        </div>
        <div class="info-user-form" style="display:block">
            <div class="info-field-account">
                <label style="min-width:200px">Xác Nhận Mật Khẩu Mới</label>
                <input id="repassword-field" type="password" required name="repassword-field">
            </div>
        </div>
        <span id="warning-pass" style="color: red; margin-left: 20px; display: none">Mật khẩu không trùng khớp</span>
        <button id="submit-pass-account" type="submit" name="save-password">Lưu Thông Tin</button>
    </form>
</div>
<script src="./js/homepage.js"></script>
<script>changeFormInfo()</script>
<script>checkPassword()</script>