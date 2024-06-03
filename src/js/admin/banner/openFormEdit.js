var bodyContainer = document.querySelector(".body__container");

$(document).on("click", ".banner-sub", function () {
    // var fullName = $(this).closest("tr").find("td:eq(1)").text().trim();
    // var userName = $(this).closest("tr").find("td:eq(2)").text().trim();

    var bodyContainer = document.querySelector(".body__container");
    bodyContainer.classList.add("form-add-is-open");
    var addFormEdit = document.createElement("div");
    addFormEdit.className = "list__form";
    bodyContainer.appendChild(addFormEdit);
    addFormEdit.innerHTML = `
        <form action="" method="post" style="height: 480px" class="list__form-add">
            <div class="list__form-title">
                <span><i class="fa-solid fa-user"></i> Chi tiết tài khoản</span><i class="fa-solid fa-xmark close-icon"
                onclick="closeFormAdd()"></i>
            </div>
            <div class="list__form-content">
                <div class="list__add-handmade">
                    <div class="list__form-box">
                        <label for="input-user-name" class="list__form-label">Tên đăng nhập</label>
                        <input type="text" class="list__form-input" id="input-user-name" value="">
                    </div>
                    <div class="list__form-box">
                        <label for="input-full-name" class="list__form-label">Họ và tên</label>
                        <input type="text" class="list__form-input" id="input-full-name" value="">
                    </div>

                </div>
            </div>
            <div class="list__form-btn">
                <button type="button" class="close-btn" onclick="closeFormAdd()">Đóng</button>
            </div>
        </form>`;
});
