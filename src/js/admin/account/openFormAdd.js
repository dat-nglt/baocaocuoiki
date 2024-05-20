var bodyContainer = document.querySelector(".body__container");

function openFormAdd() {
    bodyContainer.classList.add("form-add-is-open");
    var addFormAdd = document.createElement("div");
    addFormAdd.className = "list__form";
    bodyContainer.appendChild(addFormAdd);
    addFormAdd.innerHTML = `
        <form action="" method="post" style="height: 420px" class="list__form-add">
            <div class="list__form-title">
                <span><i class="fa-solid fa-user"></i> Thêm tài khoản</span><i class="fa-solid fa-xmark close-icon"
                onclick="closeFormAdd()"></i>
            </div>
            <div class="list__form-content">
                <div class="list__add-handmade">
                    <div class="list__form-box">
                        <label for="input-user-name" class="list__form-label">Tên đăng nhập <span>*</span></label>
                        <input type="text" class="list__form-input" name="user-name_user" required id="input-user-name"
                            placeholder="Tên tài khoản">
                    </div>
                    <div class="list__form-box">
                        <label for="input-full-name" class="list__form-label">Họ và tên</label>
                        <input type="text" class="list__form-input" name="full-name_user" id="input-full-name"
                            placeholder="Nhập họ tên">
                    </div>
                    <div class="list__form-box">
                        <label for="input-date-of-birth" class="list__form-label">Ngày sinh</label>
                        <input type="date" class="list__form-input" name="date-of-birth_user" id="input-date-of-birth"
                            placeholder="Nhập ngày sinh">
                    </div>
                    <div class="list__form-box">
                        <label for="input-address" class="list__form-label">Địa chỉ</label>
                        <input type="text" class="list__form-input" name="address_user" id="input-address"
                            placeholder="Nhập địa chỉ">
                        </div>
                    <div class="list__form-box">
                        <label for="input-phone-number" class="list__form-label">Số điện thoại</label>
                        <input type="number" class="list__form-input" name="phone-number_user" id="input-phone-number"
                            placeholder="Nhập số điện thoại">
                    </div>
                    <div class="list__form-box">
                        <label for="input-email" class="list__form-label">Email <span>*</span></label>
                        <input type="email" class="list__form-input" name="email_user" required id="input-email"
                            placeholder="Nhập email">
                    </div>
                    <div class="list__form-box">
                            <label for="input-male" class="list__form-label">Danh mục</label>
                                <select name="male_user" id="input-male">
                                    <option value="1" >Nam</option>
                                    <option value="0" >Nữ</option>
                                </select>
                        </div>
                    <div class="list__form-box" id="password-admin">
                        <label for="input-password" class="list__form-label">Mật khẩu <span>*</span></label>
                        <input type="password" class="list__form-input" name="password_user" required id="input-password" 
                            placeholder="Nhập mật khẩu">
                        <span onclick="showPassword()"><i id="eye-admin" class="fa-solid fa-eye"></i></span>
                    </div>
                </div>
            </div>
            <div class="list__form-btn">
                <button type="button" class="close-btn" onclick="closeFormAdd()">Đóng</button>
                <button type="submit" name="add_account">Thêm</button>
            </div>
        </form>`;
}
