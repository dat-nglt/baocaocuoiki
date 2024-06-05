$(document).on("click", ".list__action-open-edit", function () {
  var id = $(this).data("id");
  var name = $(this).closest("tr").find("td:eq(1)").text().trim();
  var price = $(this).closest("tr").find("td:eq(2)").text().trim().toString().replace(/\./g, '');
  var image = $(this).closest("tr").find("td:eq(3) img").attr("src");
  var count = $(this).closest("tr").find("td:eq(4)").text().trim();
  var sale = $(this).closest("tr").find("td:eq(5)").text().trim();
  var dateSale = $(this).closest("tr").find("td:eq(6)").text().trim();
  var category = $(this).closest("tr").find("td:eq(7)").text().trim();
  var des;

  $.ajax({
    url: "../src/services/admin/editForm.php",
    type: "POST",
    dataType: "json",
    data: {
      id,
    },
    success: function (result) {
      addForm(
        image,
        name,
        price,
        count,
        optionCategoryEdit,
        sale,
        convertedDateSale,
        id,
        result.data
      );
    },
    error: function (xhr, error) {
      Swal.fire({
        title: "Thông báo",
        text: error,
        icon: "error",
        timer: 1300,
showConfirmButton: false,
      });
    },
  });

  if (dateSale != "") {
    var parts = dateSale.split("-");
    var convertedDateSale = parts[2] + "-" + parts[1] + "-" + parts[0];
  }

  var optionCategoryEdit = "";

  if (selectCategory.options.length > 1) {
    for (var i = 1; i < selectCategory.options.length; i++) {
      var option = selectCategory.options[i];
      if (option.text === category) {
        optionCategoryEdit +=
          '<option value="' +
          option.value +
          '" selected>' +
          option.text +
          "</option>";
      } else {
        optionCategoryEdit +=
          '<option value="' + option.value + '">' + option.text + "</option>";
      }
    }
  }
  var bodyContainer = document.querySelector(".body__container");
  bodyContainer.classList.add("form-add-is-open");
  var addFormEdit = document.createElement("div");
  addFormEdit.className = "list__form";
  bodyContainer.appendChild(addFormEdit);
  function addForm(
    image,
    name,
    price,
    count,
    optionCategoryEdit,
    sale,
    convertedDateSale,
    id,
    des
  ) {
    addFormEdit.innerHTML = `
            <form action="" method="post" id="form-add-book" class="list__form-add" style="height: 720px;">
                <div class="list__form-title">
                    <span><i class="fa-solid fa-book icon"></i> Chỉnh sửa sản phẩm</span><i class="fa-solid fa-xmark close-icon"
                    onclick="closeFormAdd()"></i>
                </div>
                <div class="list__form-content"style="display: block">
                    <div class="list__add-handmade" style="padding: 10px 15px 0 15px;">
                        <div style="text-align: start;">
                            <div style="font-size: 18px; font-weight: 500;">Hình ảnh sản phẩm</div>
                            <div style="display: flex; flex-direction: column;">
                                <div style="display: flex;justify-content: center; margin-bottom: 5px;" id="imgContainer"></div>
                                <div style="display: flex;justify-content: center; margin-bottom: 5px;">
                                    <img style="height: 120px; width: 100px;" id="oldimg" src="${image}" alt="">
                                </div>
                                <div class="select_avatar" style="display: block">
                                    <input type="file" id="newImg" accept="image/*" onchange="changeImg(event)">
                                    <button class="button_change" type="button">Chọn ảnh</button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="list__form-box">
                                <label for="input-name" class="list__form-label">Tên sản phẩm <span>*</span></label>
                                <input type="text" class="list__form-input" id="input-name" value="${name}" required placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="list__form-box" style="margin-top: 10px">
                                    <label for="input-price" class="list__form-label">Giá tiền <span>*</span></label>
                                    <input type="number" class="list__form-input" value="${price}" inputmode="numeric" pattern="[0-9]*" id="input-price" required
                                        placeholder="Nhập giá tiền">
                                </div>
                            </div>
                    </div>
                    <div class="list__add-handmade" style="padding: 5px 15px 5px 15px;">
                        <div class="list__form-box">
                        <label for="input-count" class="list__form-label">Số lượng <span>*</span></label>
                            <input type="number" class="list__form-input" id="input-count" required
                                placeholder="Nhập số lượng" inputmode="numeric" value="${count}" pattern="[0-9]*" disabled>
                        </div>
                        <div class="list__form-box">
                            <label class="list__form-label">Thương hiệu</label>
                                <select id="category-product">
                                  ${optionCategoryEdit}
                                </select>
                        </div>
                    </div>
                    <div class="list__add-handmade" style="padding: 5px 15px 5px 15px;">
                    <div class="list__form-box">
                    <label for="input-sale" class="list__form-label">Giảm giá(%)</label>
                    <input type="number" class="list__form-input" min="0" max="99" step="1" value="${sale}" inputmode="numeric" pattern="[0-9]*" id="input-sale">
                    </div>
                    <div class="list__form-box">
                    <label for="input-date-sale" class="list__form-label">Giảm đến ngày</label>
                    <input type="date"  id="input-date-sale" class="list__form-input" value="${convertedDateSale}">
                    </div>
                    </div>
                    <input type="hidden" value="${id}" id="id_product">
                    <div class="list__add-handmade" style="display:flex; padding: 10px 15px 0 15px;">
                        <div class="list__form-box" style="flex: 1">
                            <label for="input-des" class="list__form-label">Mô tả</label>
                            <textarea id="input-des" placeholder="Nhập mô tả">${des}</textarea>
                        </div>
                    </div>
                </div>
                <div class="list__form-btn">
                    <button type="button" class="close-btn" onclick="closeFormAdd()">Đóng</button>
                    <button type="button" onclick="submitProductEdit()">Chỉnh sửa</button>
                </div>
            </form>`;
    CKEDITOR.replace("input-des");
    const inputSale = document.getElementById('input-sale');
  inputSale.addEventListener('input', function() {
    if (this.value > 99) {
      this.value = 99;
    }else if(this.value < 0){
      this.value = 0;
    }
  });
  }
});

