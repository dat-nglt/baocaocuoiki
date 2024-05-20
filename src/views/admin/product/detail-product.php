<div class="admin-title">Chi Tiết Sản Phẩm</div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="info-user" style="gap:20px;box-shadow:0 0 0 white;border-radius: 5px 5px 0 0">'
        <div>
            <div>
                <div class="old-img">
                    <img id="oldimg" src="../src/img/Product/<?= $detailProduct['hinhAnh'] ?>" alt="">
                </div>
                <div id="imgContainer"></div>
                <input type="file" id="newImg" name="hinhSanPham" accept="image/*">
            </div>

        </div>
        <div class="info-detail">
            <div class="info-field product">
                Mã Sản Phẩm:
                <input type="text" class="info-field-input" name="maSanPham" disabled
                    value="<?= $detailProduct['maSanPham'] ?>">
            </div>
            <div class="info-field product">
                Tên Sản Phẩm:
                <input type="text" class="info-field-input" name="tenSanPham" readonly
                    value="<?= $detailProduct['tenSanPham'] ?>">
            </div>
            <div class="info-field product">
                Giá Đơn Vị:
                <input type="text" class="info-field-input" name="giaSanPham" readonly
                    value="<?= $detailProduct['giaTien'] ?>">
            </div>
            <div class="info-field product">
                Số Lượng:
                <input type="text" class="info-field-input" name="soLuong" readonly
                    value="<?= $detailProduct['soLuong'] ?>">
            </div>
            <div class="info-field product">
                Loại Sản Phẩm:
                <input type="text" class="info-field-input" name="loaiSanPham" readonly
                    value="<?= $detailProduct['maLoai'] ?>">
            </div>
            <div class="info-field product">
                Giảm giá (%):
                <input type="text" class="info-field-input" name="giaGiam" readonly
                    value="<?= $detailProduct['giaGiam'] ?>">
            </div>
            <div class="info-field product">
                Giảm giá đến:
                <input type="date" id="dateSale" class="info-field-input" name="thoiGian" readonly
                    value="<?= $detailProduct['ngayHetHanGiam'] ?>">
            </div>

        </div>
        <div><i class="fa-solid fa-pen"></i></div>

    </div>
    <div class="info-user" style="box-shadow:0 0 0 white;border-radius: 5px 5px 0 0">
        <div class="info-field" style="width:100%">
            <div>Mô Tả Sản Phẩm: </div>
            <div><textarea class="info-field-input" readonly name="moTa" cols="30" rows="10"
                    style="width:100%; background-color: transparent;padding:5px;resize:none"><?= $detailProduct['moTa'] ?></textarea>
            </div>

        </div>
    </div>
    <div class="info-user" style="box-shadow:0 0 0 white;border-radius: 0 0 5px 5px;justify-content:flex-end">
        <div class="info-field button-save">
            <button name="save-product" id="buttonLock" type="submit" style="background-color: rgb(22, 115, 168)">
                Lưu Thay Đổi</button>
        </div>
    </div>

</form>

<script src="../src/js/editadmin.js"></script>
<script>editProductInfo(); setDateSale()</script>
<script src="../src/js/update-new-img.js"></script>