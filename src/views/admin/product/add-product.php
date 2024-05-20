<div class="admin-title">Thêm Sản Phẩm</div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="info-user" style="gap:20px;box-shadow:0 0 0 white;border-radius: 5px 5px 0 0">
    <div>
    <div id="imgContainer"></div>
    <img id="oldimg" src="./img/user.user.jpg" alt="">
    <input type="file" id="newImg" name="hinhSanPham" accept="image/*">
    </div>
        <div class="info-detail">
            <div class="info-field product">
                Tên Sản Phẩm:
                <input type="text" required class="info-field-input" name="tenSanPham" >
            </div>
            <div class="info-field product">
                Giá:
                <input type="text" required class="info-field-input" name="giaSanPham">
            </div>
            <div class="info-field product">
                Số Lượng:
                <input type="text" required class="info-field-input" name="soLuong">
            </div>
            <div class="info-field product ">
                Loại Sản Phẩm:
                <select style="padding: 0" name="maLoai">
                <?php foreach ($listNameClassify as $key => $value) {
                    extract($value);?>
                <option value="<?=$maLoai?>"><?=$tenLoai?></option>
                <?php } ?>
                </select>
            </div>
                    
        </div>

    </div>
    <div class="info-user" style="box-shadow:0 0 0 white;border-radius: 5px 5px 0 0">
        <div class="info-field" style="width:100%">
            <div>Mô Tả Sản Phẩm: </div>
            <div><textarea class="info-field-input" name="moTa" cols="30" rows="10" style="width:100%; background-color: transparent;padding:5px;resize:none"></textarea></div>

        </div>
    </div>
    <div class="info-user" style="box-shadow:0 0 0 white;border-radius: 0 0 5px 5px;justify-content:flex-end">
        <div class="info-field">
            <button name="add-product" id="buttonLock" type="submit" style="background-color: rgb(22, 115, 168)">
                Thêm Sản Phẩm</button>
        </div>
    </div>

</form>

<script src="../src/js/update-new-img.js"></script>
