var bodyContainer = document.querySelector(".body__container");

function openFormAdd() {
    bodyContainer.classList.add("form-add-is-open");
    var addFormAdd = document.createElement("div");
    addFormAdd.className = "list__form";
    bodyContainer.appendChild(addFormAdd);
    addFormAdd.innerHTML = `
            <form action="" method="post" id="form-add-book" class="list__form-add" style="height: 300px;">
            <div class="list__form-title">
                <span><i class="fa-brands fa-sketch icon"></i> Thêm thương hiệu</span><i class="fa-solid fa-xmark close-icon"
                onclick="closeFormAdd()"></i>
            </div>
            <div class="list__form-content"style="display: block">
                <div class="list__add-handmade" style="padding: 10px 15px">
                    <div style="text-align: start;">
                        <div style="font-size: 18px; font-weight: 500;">Hình ảnh thương hiệu <span style="color: red">*</span></div>
                        <div style="display: flex; flex-direction: column;">
                            <div style="display: flex;justify-content: center; margin: 5px;" id="imgContainer"></div>
                            <img id="oldimg" src="" alt="">
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
                    <input type="text" class="list__form-input" id="input-name" required placeholder="Nhập tên thương hiệu">
                </div>
            </div>
            <div class="list__form-btn">
                <button type="button" class="close-btn" onclick="closeFormAdd()">Đóng</button>
                <button type="button" onclick="submitCategory()" name="add-book" >Thêm</button>
            </div>
        </form>`;
}