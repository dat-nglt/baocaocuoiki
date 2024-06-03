<div class="body__container">
    <div class="list__container">
        <div>
            <div style="flex: 1;display:flex;justify-content: space-between">
                <div>
                    <span>Banner trang chủ</span>
                </div>
            </div>
        </div>
        <div>
            <div>
    <?php var_dump(mysqli_num_rows($dataProduct)) ?>
    <?php var_dump(mysqli_num_rows($dataClassify)) ?>
  
            </div>
            <div class="container banner-header">
                <div class="banner-sub">
                    <div class="image-wrapper">
                        <img id="banner-1"
                            src="https://file.hstatic.net/200000722513/file/gearvn-mua-nitro-v-nhan-qua-vip_6dc10804e83d41258ca09061fd3a59ad.jpg"
                            alt="">
                        <div class="overlay" id="avatar-preview">
                            <i class="fas fa-camera"></i>
                            <p>Nhấp vào để thay đổi</p>
                        </div>
                    </div>

                </div>
                <a href=""><img id="banner-2"
                        src="https://file.hstatic.net/200000722513/file/gearvn-mua-nitro-v-nhan-qua-vip_6dc10804e83d41258ca09061fd3a59ad.jpg"
                        alt=""></a>
            </div>
        </div>
    </div>
</div>

<script src="../src/js/admin/banner/openFormEdit.js"></script>
<script src="../src/js/admin/closeFormAdd.js"></script>
