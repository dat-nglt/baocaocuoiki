<div class="container user-account">
    <h1 class="title-form_account">HỒ SƠ NGƯỜI DÙNG</h1>
    <h2 class="title-form_account sub"><span id="info-form-account" class="active">Thông Tin Tài Khoản</span> | <span
            id="info-password-account">Đổi Mật Khẩu</span></h2>
    <form action="" method="post" id="info-basic-form">
        <div class="info-user-form">
            <input type="hidden" name="pass" value="<?= $_SESSION['user']['matKhau'] ?>">
            <div>
                <div class="info-field-account">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" readonly name="user-name" value="<?= $_SESSION['user']['tenTaiKhoan'] ?>">
                </div>
                <div class="info-field-account">
                    <label for="">Họ & Tên</label>
                    <input id="profile-fullname-input" type="text" name="name"
                        value="<?= $_SESSION['user']['tenNguoiDung'] ?>">
                </div>

                <div class="info-field-account">
                    <label for="">Email</label>
                    <input id="profile-email-input" type="text" name="email" value="<?= $_SESSION['user']['email'] ?>">
                </div>
                <div class="info-field-account gender">
                    <span id='check-sex' for="nam">Giới tính</span>
                    <input type="radio" id="nam" value="1" <?php if ($_SESSION['user']['gioiTinh'] == 1) {
                        echo 'checked';
                    }
                    ?> name="check-sex">
                    <span for="nu">Nam</span>
                    <input type="radio" value="2" id="nu" <?php if ($_SESSION['user']['gioiTinh'] == 2) {
                        echo 'checked';
                    }
                    ?> name="check-sex">
                    <span for="">Nữ</span>
                    <input type="radio" value="0" <?php if ($_SESSION['user']['gioiTinh'] == 0) {
                        echo 'checked';
                    }
                    ?> name="check-sex">
                    <span for="">Khác</span>
                </div>
            </div>
            <divx>
                <div class="info-field-account">
                    <label for="">Số điện thoại</label>
                    <input id="profile-numberphone-input" type="text" name="tel"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                        value="<?= $_SESSION['user']['soDienThoai'] ?>">
                </div>


                <div class="info-field-account">
                    <label for="">Địa chỉ</label>
                    <input id="profile-address-input" type="text" name="address"
                        value="<?= $_SESSION['user']['diaChi'] ?>">
                </div>
                <div class="info-field-account">
                    <label for="">Ngày sinh</label>
                    <input id="profile-dob-input" type="date" name="date" value="<?= $_SESSION['user']['ngaySinh'] ?>">
                </div>
            </divx>
        </div>


        <button id="submit-info-account" type="button" name="save-profile">Lưu Thông Tin</button>
    </form>

    <form action="" method="post" id="info-password-form" style="display:none; text-align: center;">
        <div class="info-user-form" style="display:block">
            <div class="info-field-account password-field-box">
                <label style="min-width:200px; text-align: left;">Mật khẩu cũ</label>
                <input class="password-field" id="password-current" type="password" name="password-current">
                <span class="error_message">Mật khẩu hiện tại không được trống</span>
            </div>
        </div>
        <div class="info-user-form" style="display:block">
            <div class="info-field-account password-field-box">
                <label style="min-width:200px; text-align: left;">Mật khẩu mới</label>
                <input class="password-field" id="new-password" type="password" name="password-field">
                <span class="error_message">Mật khẩu mới không được trống</span>
            </div>
        </div>
        <div class="info-user-form" style="display:block">
            <div class="info-field-account password-field-box">
                <label style="min-width:200px; text-align: left;">Xác nhận mật khẩu mới</label>
                <input class="password-field" id="confirm-password" type="password" name="repassword-field">
                <span class="error_message">Mật khẩu xác nhận không được trống</span>
            </div>
        </div>
        <span id="warning-pass" style="color: red; margin-left: 20px; display: none">Mật khẩu không trùng khớp</span>
        <button id="submit-pass-account" type="button" name="save-password">Xác nhận</button>
    </form>
</div>
<style>
    .password-field-box {
        position: relative;
        margin-bottom: 30px;
        padding: 0;
    }

    .error_message {
        display: none;
        position: absolute;
        left: 485px;
        bottom: -18px;
        z-index: 100;
        font-size: 13px;
        font-style: italic;
        color: red;
    }
</style>
<script>
    const infoFormBtn = document.querySelector("#info-form-account");
    const passFormBtn = document.querySelector("#info-password-account");
    const infoBasicForm = document.querySelector("#info-basic-form");
    const infoPasswordForm = document.querySelector("#info-password-form");
    infoFormBtn.addEventListener("click", () => {
        passFormBtn.classList.remove("active");
        infoFormBtn.classList.add("active");
        infoPasswordForm.style.display = "none";
        infoBasicForm.style.display = "";
    });
    passFormBtn.addEventListener("click", () => {
        infoFormBtn.classList.remove("active");
        passFormBtn.classList.add("active");
        infoBasicForm.style.display = "none";
        infoPasswordForm.style.display = "";
    });
</script>


<script>
    const passwordFiled = document.querySelectorAll('.password-field');
    const errorInfo = document.querySelectorAll(".error_message");

    let passwordPattern =
        /^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/;
    let emailPattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    let phoneRegex = /^\d{10}$|^\d{11}$/;

    passwordFiled.forEach((input, index) => {
        input.addEventListener("input", function () {
            input.value = /\s/.test(input.value) ? input.value.replace(/\s+/g, "") : input.value;
        });
    });

    passwordFiled.forEach((input, index) => {
        input.addEventListener("blur", function () {
            console.log(1);
            errorInfo[index].style.display = input.value === "" ? "block" : "none";
        });
    });

    $('#submit-pass-account').on('click', function () {
        const currentPass = $('#password-current').val();
        const newPassword = $('#new-password').val();
        const confirmPassword = $('#confirm-password').val();
        if (!currentPass || !newPassword || !confirmPassword) {
            Swal.fire({
                title: "Thông báo",
                text: "Vui lòng điền đầy đủ thông tin nhé!",
                icon: "warning",
                showConfirmButton: false,
                timer: 1300,
            })
            return;
        }

        if (newPassword !== "" && !passwordPattern.test(newPassword)) {
            Swal.fire({
                title: "Thông báo",
                text: "Mật khẩu tối thiểu 8 kí tự, bao gồm chữ hoa, số và kí tự đặc biệt !",
                icon: "warning",
                showConfirmButton: false,
                timer: 1300,
            })
            return;
        }

        if (newPassword !== confirmPassword) {
            Swal.fire({
                title: "Thông báo",
                text: "Mật khẩu xác nhận không trùng khớp",
                icon: "warning",
                showConfirmButton: false,
                timer: 1300,
            })
            return;
        }

        console.log(currentPass, newPassword, confirmPassword);

        $.ajax({
            url: "../src/services/changePasswordService.php",
            type: "POST",
            dataType: "json",
            data: {
                currentPass,
                newPassword,
                confirmPassword
            },
            success: function (result) {
                Swal.fire({
                    title: "Thông báo",
                    text: result.msg,
                    icon: result.status,
                    showConfirmButton: false,
                    timer: 1300,
                })
                return;
            },
            error: function (xhr, error) {
                Swal.fire({
                    title: "Thông báo",
                    text: 'Đã có lỗi xảy ra',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1000,
                })
                return;
            },

        });
    })
</script>

<script>
    $('#submit-info-account').on('click', function () {
        let profileFullname = $('#profile-fullname-input').val().replace(/\s+/g, ' ');
        let profileAddress = $('#profile-address-input').val().replace(/\s+/g, ' ');
        let profileGender = $('input[name="check-sex"]:checked').val();
        let profileNumberphone = $('#profile-numberphone-input').val();
        let profileEmail = $('#profile-email-input').val();
        let profileDOB = $('#profile-dob-input').val();

        if (profileEmail !== "" && !emailPattern.test(profileEmail)) {
            Swal.fire({
                title: "Thông báo",
                text: "Vui lòng nhập đúng định dạng Email",
                icon: "warning",
                showConfirmButton: false,
                timer: 1300,
            })
            return;
        }

        if (profileNumberphone !== "" && !phoneRegex.test(profileNumberphone)) {
            Swal.fire({
                title: "Thông báo",
                text: "Vui lòng nhập đúng định dạng số điện thoại",
                icon: "warning",
                showConfirmButton: false,
                timer: 1300,
            })
            return;
        }

        $.ajax({
            url: "../src/services/changeProfileService.php",
            type: "POST",
            dataType: "json",
            data: {
                profileFullname,
                profileAddress,
                profileGender,
                profileEmail,
                profileNumberphone,
                profileDOB
            },
            success: function (result) {
                Swal.fire({
                    title: "Thông báo",
                    text: result.msg,
                    icon: result.status,
                    showConfirmButton: false,
                    timer: 1300,
                })
                return;
            },
            error: function (xhr, error) {
                Swal.fire({
                    title: "Thông báo",
                    text: 'Đã có lỗi xảy ra',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1000,
                })
                return;
            },

        });

    })
</script>