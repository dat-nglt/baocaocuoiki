$(document).on("click", ".list__action-open-edit", function () {
    var id = $(this).data('id');
    var name = $(this).closest("tr").find("td:eq(1)").text().trim();
    var image = $(this).closest("tr").find("td:eq(2) img").attr("src");

    var bodyContainer = document.querySelector(".body__container");
    bodyContainer.classList.add("form-add-is-open");
    var addFormEdit = document.createElement("div");
    addFormEdit.className = "list__form";
    bodyContainer.appendChild(addFormEdit);
    addFormEdit.innerHTML = `
            <form action="" method="post" id="form-add-book" class="list__form-add" style="height: 540px; width: 500px">
            <div class="list__form-title">
                <span><i class="fa-brands fa-sketch icon"></i> Chỉnh sửa thương hiệu</span><i class="fa-solid fa-xmark close-icon"
                onclick="closeFormAdd()"></i>
            </div>
            <div class="list__form-content"style="display: block">
                <div class="list__add-handmade" style="padding: 10px 15px; dis">
                    <div style="text-align: start;">
                        <div style="font-size: 18px; font-weight: 500;">Hình ảnh thương hiệu <span style="color: red">*</span></div>
                        <div style="display: flex; flex-direction: column;">
                        <div style="display: flex;justify-content: center; margin-bottom: 5px;" id="imgContainer"></div>
                        <div style="display: flex;justify-content: center; margin-bottom: 5px;">
                            <img style="height: 250px; width: 250px;" id="oldimg" src="${image}" alt="">
                        </div>
                            <div class="select_avatar" style="display: block">
                                <input type="file" id="newImg" accept="image/*" onchange="changeImg(event)">
                                <button class="button_change" type="button">Chọn ảnh</button>
                            </div>
                        </div>
                    </div>
                    <div>
                </div>
            </div>
            <div class="list__add-handmade" style="padding: 10px 15px;display: flex">
                <div class="list__form-box" style="flex: 1">
                    <label for="input-name" class="list__form-label">Tên thương hiệu <span>*</span></label>
                    <input type="text" class="list__form-input" id="input-name" value="${name}" required placeholder="Nhập tên thương hiệu">
                </div>
            </div>
            <input type="hidden" value="${id}" id="id_category">
            <div class="list__form-btn">
                <button type="button" class="close-btn" onclick="closeFormAdd()">Đóng</button>
                <button type="button" onclick="submitCategoryEdit()">Chỉnh sửa</button>
            </div>
        </form>`;
});

