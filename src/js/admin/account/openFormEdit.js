var bodyContainer = document.querySelector(".body__container");

$(document).on("click", ".list__action-open-edit", function () {
    var fullName = $(this).closest("tr").find("td:eq(1)").text().trim();
    var userName = $(this).closest("tr").find("td:eq(2)").text().trim();
    var address = $(this).closest("tr").find("td:eq(3)").text().trim();
    var phoneNumber = $(this).closest("tr").find("td:eq(4)").text().trim();
    var email = $(this).closest("tr").find("td:eq(5)").text().trim();
    var male = $(this).closest("tr").find("td:eq(6)").text().trim();
    var dateOfBirth = $(this).closest("tr").find("td:eq(7)").text().trim();
    var dateJoin = $(this).closest("tr").find("td:eq(8)").text().trim();
    var status = $(this).closest("tr").find("td:eq(9)").text().trim();

    var bodyContainer = document.querySelector(".body__container");
    bodyContainer.classList.add("form-add-is-open");
    var addFormEdit = document.createElement("div");
    addFormEdit.className = "list__form";
    bodyContainer.appendChild(addFormEdit);
    addFormEdit.innerHTML = `
        <form action="" method="post" style="height: 500px" class="list__form-add">
            <div class="list__form-title">
                <span><i class="fa-solid fa-user"></i> Chi tiết tài khoản</span><i class="fa-solid fa-xmark close-icon"
                onclick="closeFormAdd()"></i>
            </div>
            <div class="list__form-content">
                <div class="list__add-handmade">
                    <div class="list__form-box">
                        <label for="input-user-name" class="list__form-label">Tên đăng nhập</label>
                        <input type="text" class="list__form-input" disabled id="input-user-name" value="${userName}">
                    </div>
                    <div class="list__form-box">
                        <label for="input-full-name" class="list__form-label">Họ và tên</label>
                        <input type="text" class="list__form-input" disabled id="input-full-name" value="${fullName}">
                    </div>
                    <div class="list__form-box">
                        <label for="input-date-of-birth" class="list__form-label">Ngày sinh</label>
                        <input type="text" class="list__form-input" disabled id="input-date-of-birth" value="${dateOfBirth}">
                    </div>
                    <div class="list__form-box">
                        <label for="input-address" class="list__form-label">Địa chỉ</label>
                        <input type="text" class="list__form-input" disabled id="input-address" value="${address}">
                        </div>
                    <div class="list__form-box">
                        <label for="input-phone-number" class="list__form-label">Số điện thoại</label>
                        <input type="number" class="list__form-input" disabled id="input-phone-number" value="${phoneNumber}">
                    </div>
                    <div class="list__form-box">
                        <label for="input-email" class="list__form-label">Email</label>
                        <input type="email" class="list__form-input" disabled required id="input-email" value="${email}">
                    </div>
                    <div class="list__form-box">
                        <label for="input-male" class="list__form-label">Giới tính</label>
                        <input type="text" class="list__form-input" disabled required id="input-male" value="${male}">
                    </div>
                    <div class="list__form-box">
                        <label for="input-date" class="list__form-label">Ngày tham gia</label>
                        <input type="text" class="list__form-input" disabled required id="input-date" value="${dateJoin}">
                    </div>
                    <div class="list__form-box">
                        <label for="input-status" class="list__form-label">Trạng thái tài khoản</label>
                        <input type="text" class="list__form-input" disabled required id="input-status" value="${status}">
                    </div>
                </div>
            </div>
            <div class="list__form-btn">
                <button type="button" class="close-btn" onclick="closeFormAdd()">Đóng</button>
            </div>
        </form>`;
});
