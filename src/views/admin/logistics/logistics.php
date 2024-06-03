<style>
  .body__container {
    display: flex;
    background-color: var(--black-gray-cl);
    min-height: 100vh;
    color: var(--white-cl);

    .list__container {
      flex: 1;
      padding: 10px 30px 20px;
      margin-left: 182px;

      div:first-of-type {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      span {
        text-transform: uppercase;
        font-weight: 600;
        font-size: 25px;
      }

      button {
        font-size: 15px;
        color: var(--white-cl);
        background-color: var(--blue-white-cl);
        padding: 8px 13px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;

        &:hover {
          background-color: var(--blue-white-cl);
        }
      }

      table {
        margin-top: 5px;
        width: -webkit-fill-available;
        border-collapse: collapse;
        border-bottom: 2px solid var(--gray-cl);

        th,
        td {
          color: var(--black-cl);
          text-align: center;
          border: 1px solid var(--gray-cl);
        }

        th {
          color: var(--white-cl);
          text-transform: uppercase;
          font-weight: 600;
          font-size: 13px;
          padding: 12px;
          background-color: var(--blue-white-cl);
        }

        td {
          font-size: 13px;
          padding: 7.5px 5px;
          background-color: var(--white-cl);
        }

        .list__hidden-text {
          display: -webkit-box;
          overflow: hidden;
          -webkit-line-clamp: 1;
          -webkit-box-orient: vertical;
          margin: 0;
          word-break: break-word;
        }

        .list__content td:last-of-type div {
          display: flex;
          justify-content: center;
          margin: 0;
          font-size: 15px;

          .list__icon-edit {
            color: var(--green-cl);
          }

          .list__icon-del {
            color: var(--red-cl);
          }

          .list__action-open-edit,
          .list__action-btn {
            padding: 0;
            background-color: transparent !important;
            outline: 0;
            border: none;
          }

          i:hover {
            cursor: pointer;
          }
        }
      }

      fieldset {
        width: fit-content;
        background-color: transparent;
        border-radius: 5px;
        padding: 0px 10px 2px 10px;

        .admin__form-search {
          display: flex;
          gap: 7px;
          align-items: center;
        }

        legend {
          font-size: 15px;
          font-weight: 500;
        }

        input[type="text"] {
          padding: 2px 0 4px 0;
          color: var(--white-cl);
          font-size: 15px;
          outline: 0;
          background-color: transparent;
          border: none;
        }

        button {
          padding: 0;
          font-size: 15px;
          cursor: pointer;
          color: var(--white-cl);
          border: 0;
          border-radius: 5px;
          background-color: transparent;

          &:hover {
            background-color: transparent;
          }
        }

        select {
          border: none;
          background-color: transparent;
          color: var(--white-cl);
          width: fit-content;
          margin-left: -5px;
          font-size: 15px;
          padding: 4px 0;

          &:focus-within {
            outline: none;
          }

          option {
            color: var(--black-cl);

            &:checked {
              font-weight: bold;
            }
          }
        }
      }

      .list__paging {
        background-color: var(--white-cl);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;

        div:first-of-type {
          align-items: normal;
          gap: 0;
        }

        >span {
          font-weight: 600;
          text-transform: none;
          font-size: 13px;
          color: var(--black-cl);
          margin-right: 10px;
          max-width: 700px;
          overflow: hidden;

          >span {
            text-transform: none;
            font-size: 13px;
            font-weight: 500;
          }
        }

        button {
          border-radius: 4px;
          color: var(--black-gray-cl);
          padding: 4px 10px;
          font-size: 15px;
          cursor: pointer;
          background-color: var(--gray-white-cl);
          transition: all 0.1s linear;
          margin-left: 5px;

          &:hover {
            color: var(--white-cl);
            background-color: var(--blue-white-cl);
          }
        }

        .button-current button {
          color: var(--white-cl);
          background-color: var(--blue-white-cl);
        }
      }
    }

    .list__form {
      position: fixed;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.7);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1;
      backdrop-filter: blur(1px);

      .list__form-add {
        text-align: center;
        color: var(--black-cl);
        background-color: var(--white-cl);
        width: 660px;
        position: relative;

        .list__form-title {
          color: var(--white-cl);
          position: relative;
          padding: 20px;
          background-color: var(--blue-cl);

          >span {
            font-size: 30px;
            font-weight: 700;
            text-transform: uppercase;
          }

          .close-icon {
            font-size: 25px;
            padding: 8px 10px;
            position: absolute;
            right: 0;
            top: 0;
            cursor: pointer;
            color: var(--red-cl);

            &:hover {
              color: var(--red-black-cl);
            }
          }
        }

        .list__form-content {
          display: flex;

          .list__form-nav {
            border-right: 1px solid var(--black-gray-cl);

            >div {
              text-transform: uppercase;
              font-size: 18px;
              font-weight: 600;
              padding: 10px;
              cursor: pointer;

              &:hover {
                color: var(--orange-cl);
              }
            }
          }

          .list__select-file {
            display: none;
            position: relative;
            overflow: hidden;

            input[type="file"] {
              position: absolute;
              left: 0;
              top: 0;
              opacity: 0;
              width: 100%;
              height: 100%;
              cursor: pointer;
            }

            button {
              background-color: var(--green-cl);
              margin: 0;
            }
          }

          .list__file-selected {
            margin-top: 10px;
          }

          .list__add-handmade {
            flex: 1;
            display: grid;
            grid-template-columns: 48% 48%;
            grid-gap: 4%;
            padding: 10px 15px;

            .select_avatar {
              display: none;
              position: relative;
              overflow: hidden;

              input[type="file"] {
                position: absolute;
                left: 0;
                top: 0;
                opacity: 0;
                width: 100%;
                height: 100%;
                cursor: pointer;
              }

              .button_change {
                border: none;
                background-color: var(--blue-white-cl);
                color: var(--white-cl);
                padding: 3px 5px;
                border-radius: 3px;
                width: 100%;
              }
            }
          }

          #password-admin {
            position: relative;

            input[type="password"] {
              padding: 6px 25px 6px 6px;
            }

            >span {
              color: black;
              position: absolute;
              right: 0;
              top: 30px;
            }
          }

          .list__form-box {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 5px;

            .list__form-label {
              font-size: 18px;
              font-weight: 500;
            }

            span {
              color: var(--red-cl);
            }

            input,
            textarea {
              font-size: 16px;
              width: 100%;
              padding: 6px;
              resize: none;
              border: 1px solid var(--black-gray-cl);
              outline: none;
              border-radius: 5px;

              &::placeholder {
                font-size: 15px;
                font-style: italic;
              }
            }

            input[type="date"] {
              padding: 5px;
            }

            textarea {
              min-height: 150px;
            }

            select {
              background-color: var(--white-cl);
              padding: 6.4px;
              font-size: 14px;
              width: 100%;
              cursor: pointer;
              border-radius: 5px;

              &:focus {
                outline: none;
                border-color: var(--black-cl);
              }

              option {
                margin-top: 20px;
                word-wrap: break-word;
                font-size: 15px;
                color: var(--black-gray-cl);

                &:checked {
                  font-weight: bold;
                }
              }
            }
          }
        }

        .list__form-btn {
          position: absolute;
          right: 0;
          bottom: 0;
        }

        button {
          color: var(--white-cl);
          background-color: var(--green-black-cl);
          padding: 8px 25px;
          margin-right: 15px;
          margin-bottom: 10px;
          outline: none;
          border: 0;
          border-radius: 5px;
          font-size: 15px;
          font-weight: 600;
          cursor: pointer;
          text-transform: uppercase;

          &:hover {
            background-color: var(--green-cl);
          }

          &:first-of-type {
            background-color: var(--red-black-cl);

            &:hover {
              background-color: var(--red-cl);
            }
          }
        }
      }
    }
  }

  #cke_input-des {
    width: 100%;
  }

  .cke_contents {
    height: 130px !important;
  }

  .item__add__logistics {
    font-size: 12px;
    display: flex;
    flex-direction: column;
    text-align: left;
    padding: 6px;
    border-radius: 5px;
    color: var(--blue-cl);
    border: 2px solid var(--blue-cl);
  }
</style>

<div class="body__container">
  <div class="list__container">
    <div style="flex: 1;display:flex;justify-content: space-between">
      <div>
        <span>Danh sách nhập xuất</span><button onclick="openFormAdd()" id="list__add-btn" type="button">Nhập / Xuất Sản
          Phẩm</button>
      </div>

      <div style="display:flex; gap: 5px; justify-content: center; padding: 0 0 5px;align-items: center;">
        <fieldset>
          <legend>Tìm kiếm</legend>
          <form action="" method="post" class="admin__form-search">
            <input type="text" name="search__logistics" placeholder="Tên sản phẩm" autocomplete="off">
            <select name="sort__in__out" id="sort__in__out">
              <option value="" <?php if ($_SESSION['sort__in__out'] === "")
                echo 'selected' ?>>
                  Tất cả
                </option>
                <option value="1" <?php if ($_SESSION['sort__in__out'] === '1')
                echo 'selected' ?>>
                  Nhập hàng
                </option>
                <option value="0" <?php if ($_SESSION['sort__in__out'] === '0')
                echo 'selected' ?>>
                  Xuất hàng
                </option>
              </select>
              <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </fieldset>
          <fieldset>
            <legend>Sắp xếp</legend>
            <form action="" method="post" class="admin__form-search">
              <select name="sort__date" id="">
                <option value="desc" <?php if ($_SESSION['sort__date'] === 'desc')
                echo 'selected' ?>>
                  Mới nhất
                </option>
                <option value="asc" <?php if ($_SESSION['sort__date'] === 'asc')
                echo 'selected' ?>>Cũ
                  nhất
                </option>
              </select>
              <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </fieldset>
        </div>
      </div>
      <table>
        <tr>
          <th style="width: 5%;">#</th>
          <th style="width: 6%;">Mã NX</th>
          <th style="width: 25%;">Tên sản phẩm</th>
          <th style="width: 9%;">Số lượng</th>
          <th style="width: 9%;">Thời gian</th>
          <th style="width: 20%;">Địa chỉ</th>
          <th style="width: 20%;">Ghi chú</th>
          <th style="width: 15%;">Trạng thái</th>
        </tr>
        <?php
              $stt = (($current_page - 1) * $limitPage) + 1;
              foreach ($logisticsData as $item) {
                $item[6] = $item[6] == 1 ? 'Nhập' : 'Xuất';
                ?>
        <tr class="list__content">
          <td><?= $stt ?></td>
          <td>
            <div class="list__hidden-text" style="-webkit-line-clamp: 2;"><?= $item[0] ?></div>
          </td>
          <td>
            <div class="list__hidden-text" style="-webkit-line-clamp: 2;"><?= $item[1] ?></div>
          </td>
          <td>
            <div class="list__hidden-text" style="-webkit-line-clamp: 2;"><?= $item[2] ?></div>
          </td>
          <td>
            <div class="list__hidden-text" style="-webkit-line-clamp: 2;"><?= $item[3] ?></div>
          </td>
          <td>
            <div class="list__hidden-text" style="-webkit-line-clamp: 2;"><?= $item[4] ?></div>
          </td>
          <td>
            <div class="list__hidden-text" style="-webkit-line-clamp: 2;"><?= $item[5] ?></div>
          </td>
          <td>
            <div class="list__hidden-text" style="-webkit-line-clamp: 2;"><?= $item[6] ?></div>
          </td>

        </tr>
        <?php $stt++;
              } ?>
    </table>
    <div class="list__paging">
      <div>
        <?php
        if ($total_page > 1) {
          if ($current_page > 3) {
            echo '<a href="index.php?page=logistics&pageNumber=1"> <button><i class="fa-solid fa-angles-left"></i></button></a>';
          }
          if ($current_page > 1) {
            echo ' <a href="index.php?page=logistics&pageNumber=' . ($current_page - 1) . '"><button><i class="fa-solid fa-angle-left"></i></button></a>';
          }
          for ($i = 1; $i <= $total_page; $i++) {
            if ($i != $current_page) {
              if ($i > $current_page - 3 && $i < $current_page + 3) {
                echo '<a href="index.php?page=logistics&pageNumber=' . $i . '"><button class="button">' . $i . '</button></a>';
              }
            } else {
              echo '<a href="index.php?page=logistics&pageNumber=' . $i . '" class="button-current"><button class="button" >' . $i . '</button></a>';
            }
          }
          if ($current_page < $total_page) {
            echo '<a href="index.php?page=logistics&pageNumber=' . ($current_page + 1) . '"> <button><i class="fa-solid fa-angle-right"></i></button></a>';
          }
          if ($current_page < $total_page - 2) {
            echo '<a href="index.php?page=logistics&pageNumber=' . ($total_page) . '"><button><i class="fa-solid fa-angles-right"></i></button></a>';
          }
        }
        ?>
      </div>

      <?php if ($_SESSION['search__logistics'] != '') { ?>
        <span>Từ khóa đã tìm kiếm: <span><?= $_SESSION['search__logistics'] ?></span></span>
      <?php } ?>
    </div>
  </div>
</div>


<script>
  var bodyContainer = document.querySelector(".body__container");
  var selectCategory = document.querySelector("#sort-classify-product");

  function openFormAdd() {
    var productData =
      <?php echo json_encode($productData); ?>;
    var optionCategory = "";

    productData.map((item, index) => {
      optionCategory +=
        '<option class="option__product" value="' + item[1] + '" data-count="' + item[2] + '" data-name="' + item[0] + '">' + item[1] + ' - ' + item[0] + '</option>'
    })
    bodyContainer.classList.add("form-add-is-open");
    var addFormAdd = document.createElement("div");
    addFormAdd.className = "list__form";
    bodyContainer.appendChild(addFormAdd);
    addFormAdd.innerHTML = `
            <form action="" method="post" id="form-add-book" class="list__form-add" style="height: 540px;">
            <div class="list__form-title">
                <span><i class="fa-solid fa-book icon"></i>Nhập Xuất Sản Phẩm</span><i class="fa-solid fa-xmark close-icon"
                onclick="closeFormAdd()"></i>
            </div>
            <div class="list__form-content"style="display: block">
                <div class="list__add-handmade" style="display: block">
                    <div class="list__form-box">
                        <label class="list__form-label">Sản phẩm <span>*</span></label>
                            <select id="logistics__product__name">
                            ${optionCategory}
                            </select>
                    </div>
                </div>
                <div class="list__add-handmade">
                    <div class="list__form-box">
                        <label class="list__form-label">Trạng thái <span>*</span></label>
                            <select id="logistics__product__status">
                            <option value="1">Nhập sản phẩm</option>
                            <option value="0">Xuất sản phẩm</option>
                            </select>
                    </div>
                    <div class="list__form-box">
                    <label for="input-count" class="list__form-label">Số lượng <span>*</span></label>
                        <input type="number" class="list__form-input" id="logistics__product__quantity" required
                            placeholder="Nhập số lượng..." inputmode="numeric" pattern="[0-9]*">
                    </div>

                </div>
                <div class="list__add-handmade" style="display:flex; padding: 10px 15px 0 15px;">
                    <div class="list__form-box" style="flex: 1;">
                        <label for="input-des" class="list__form-label">Địa chỉ <span>*</span></label>
                        <input id="address__logistics" placeholder="Nhập địa chỉ..."></input>
                    </div>
                    <div class="list__form-box" style="flex: 1;">
                        <label for="input-des" class="list__form-label">Ghi chú</label>
                        <input id="note__logistics" placeholder="Nhập ghi chú..."></input>
                    </div>
                </div>
                <div class="list__add-handmade" style="display:flex; padding: 10px 15px 0 15px;">
                    <div class="list__form-box" style="flex: 1;">
                        <label for="input-des" class="list__form-label">Danh sách nhập / xuất</label>
                        <div  id="container__list__logistics" style="width: 100%;
                        border: 1px solid #333;
                        height: 150px;
                        border-radius: 5px;
                        overflow: scroll;
                        display: flex;
                        flex-direction: column;
                        gap: 5px;
                        padding: 5px;
                        overflow-x: hidden;
                        ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="list__form-btn">
                <button type="button" class="close-btn" onclick="closeFormAdd()">Đóng</button>
                <button type="button" class="close-btn" onclick="addListLogstics()" style="background-color: blue;">Thêm</button>
                <button type="button" onclick="submitLogistics()" name="add-book" >Xác nhận</button>
            </div>
        </form>`;
        const inputQuantity = document.getElementById('logistics__product__quantity');
  inputQuantity.addEventListener('input', function() {
    if (this.value < 0) {
      this.value = 0;
    }
  });
    // CKEDITOR.replace('input-des');
  }
</script>

<script>
  function closeFormAdd() {
    bodyContainer.lastChild.remove();
    bodyContainer.classList.remove("form-add-is-open");
  }

  bodyContainer.addEventListener("click", function (e) {
    if (bodyContainer.classList.contains("form-add-is-open")) {
      var formAdd = document.querySelector(".list__form");
      var formAdd1 = document.querySelector(".list__form-add");
      formAdd.addEventListener("click", function (e) {
        if (!formAdd1.contains(e.target)) {
          closeFormAdd();
        }
      });
      formAdd.addEventListener("click", function (e) {
        e.stopPropagation();
      });
    }
  });

</script>

<script>

</script>

<script>
  var listDataLogistics = [];
  function addListLogstics() {
    var productID = $("#logistics__product__name").val();
    var productName = $(".option__product:selected").data('name');
    var productQuantityInStock = $(".option__product:selected").data('count');
    var statusLogistics = $("#logistics__product__status").val();
    var quantityLogistics = $("#logistics__product__quantity").val();
    var addressLogistics = $("#address__logistics").val();
    var noteLogistics = $("#note__logistics").val();

    if (isNaN(quantityLogistics) || quantityLogistics === '') {
        Swal.fire({
            title: "Thông báo",
            text: "Số lượng là số",
            icon: "warning",
            showConfirmButton: true,
        });
        return;
      }
      
      const number = parseFloat(quantityLogistics);
      if (number < 0) {
        Swal.fire({
            title: "Thông báo",
            text: "Vui lòng nhập số lượng lớn hơn 0",
            icon: "warning",
            showConfirmButton: true,
        });
        return;
      }
    var itemListDataLogistics = [productID, number, addressLogistics, noteLogistics, statusLogistics];

    if (
      number === ""
    ) {
      Swal.fire({
        title: "Thông báo",
        text: "Vui lòng nhập số lượng sản phẩm",
        icon: "warning",
        showConfirmButton: true,
      });
      return;
    }

    if (
      number > productQuantityInStock && statusLogistics == '0'
    ) {
      Swal.fire({
        title: "Thông báo",
        text: `Số lượng tồn kho không đủ để xuất sản phẩm`,
        icon: "warning",
        showConfirmButton: true,
      });
      return;
    }

    listDataLogistics.push(itemListDataLogistics);

    if (
      productID === "" ||
      addressLogistics === "" ||
      statusLogistics === "" ||
      number === ""
    ) {
      Swal.fire({
        title: "Thông báo",
        text: "Vui lòng nhập các thông tin bắt buộc",
        icon: "warning",
        showConfirmButton: true,
      });
      return;
    }

    statusLogistics = statusLogistics === '1' ? 'Nhập sản phẩm' : 'Xuất sản phẩm';
    var newItem = $(`<div class="item__add__logistics">` +
      `<strong>${productName}</strong>` +
      `<strong>Số lượng: ${number}</strong>` +
      `<strong>Trạng thái: ${statusLogistics}</strong>` +
      `</div>`);
    var containerDataListLogistics = $('#container__list__logistics');
    containerDataListLogistics.append(newItem);
  }

  function submitLogistics() {
    if (listDataLogistics.length <= 0) {
      Swal.fire({
        title: "Thông báo",
        text: "Không có dữ liệu nhập xuất",
        icon: "warning",
        showConfirmButton: true,
      });
      return;
    }
    $.ajax({
      url: "../src/services/admin/logisticsProduct.php",
      type: "POST",
      dataType: "json",
      data: {
        listDataLogistics
      },
      success: function (result) {
        Swal.fire({
          title: "Thông báo",
          text: result.msg,
          icon: result.status,
          showConfirmButton: true,
        }).then(function () {
          window.location.assign(
            result.path
          );
        });
      },
      error: function (xhr) {
        Swal.fire({
          title: "Warning",
          text: "Nhập sản phẩm không thành công",
          icon: "error",
          showConfirmButton: true,
        }).then(function () {
          window.location.assign(
            "index.php?page=logistics"
          );
        });
      }
    });
  };
</script>