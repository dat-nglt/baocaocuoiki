var bodyContainer = document.querySelector(".body__container");

$(document).on("click", ".categoryDetail", function () {
    optionProduct = '';
    var image = $("#banner-2").attr("src");

    if (listProduct.length > 0) {
        for (var i = 0; i < listProduct.length; i++) {
            optionProduct +=
                '<option value="' +
                listProduct[i][0] +
                '">' +
                listProduct[i][1] +
                "</option>";
        }
    } 

    var bodyContainer = document.querySelector(".body__container");
    bodyContainer.classList.add("form-add-is-open");
    var addFormEdit = document.createElement("div");
    addFormEdit.className = "list__form";
    bodyContainer.appendChild(addFormEdit);
    addFormEdit.innerHTML = `
        <form action="" method="post" style="height: 545px" class="list__form-add">
            <div class="list__form-title">
                <span><i class="fa-solid fa-images"></i> Banner sản phẩm</span><i class="fa-solid fa-xmark close-icon"
                onclick="closeFormAdd()"></i>
            </div>
            <div class="list__form-content" style="display: block">
                <div class="list__add-handmade" style="display: block; padding: 10px 15px 0 15px;">
                    <div style="text-align: start;">
                    <div style="font-size: 18px; font-weight: 500;">Hình ảnh banner phụ <span style="color: red">*</span></div>
                    <div style="display: flex; flex-direction: column;">
                        <div style="display: flex;justify-content: center; margin-bottom: 5px;" id="imgContainer"></div>
                        <img id="oldimg" style="height: 270px; width: 630px" src="${image}" alt="">
                        <div class="select_avatar" style="display: block; margin-top: 5px;">
                            <input type="file" id="newImg" accept="image/*" onchange="changeImg(event)">
                            <button class="button_change" type="button">Chọn ảnh</button>
                        </div>
                    </div>
                </div>
                </div>
                <div class="list__add-handmade" style="display: block; padding: 10px 15px 0 15px;">
                <div class="list__form-box">
                <label class="list__form-label">Thương hiệu của banner <span style="color: red">*</span></label>
                    <select id="detail-product-form">
                        ${optionProduct}
                    </select>
            </div>
            </div>
            </div>
            <div class="list__form-btn">
                <button type="button" class="close-btn" onclick="closeFormAdd()">Đóng</button>
                <button type="button" onclick="submit2ndBanner()">Xác nhận</button>
            </div>
        </form>`;
});
