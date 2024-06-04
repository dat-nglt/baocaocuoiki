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
            <div class="container banner-header">
                <div class="banner-sub categoryBanner">
                    <div class="image-wrapper">
                        <img id="banner-1"
                            src="<?= $dataBanner[0][1]?>"
                            alt="">
                        <div class="overlay" id="avatar-preview">
                            <i class="fas fa-camera"></i>
                            <p>Nhấp vào để thay đổi</p>
                        </div>
                    </div>
                </div>
                <div class="banner-sub categoryDetail">
                    <div class="image-wrapper">
                        <img id="banner-2"
                            src="<?= $dataBanner[1][1]?>"
                            alt="">
                        <div class="overlay" id="avatar-preview">
                            <i class="fas fa-camera"></i>
                            <p>Nhấp vào để thay đổi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script> var listClassify = <?php echo json_encode(mysqli_fetch_all($dataClassify)) ?> ;</script>
<script> var listProduct = <?php echo json_encode(mysqli_fetch_all($dataProduct)) ?> ;</script>

<script src="../src/js/admin/banner/openFormEditCategory.js"></script>
<script src="../src/js/admin/banner/openFormEditDetail.js"></script>
<script src="../src/js/admin/closeFormAdd.js"></script>
<script src="../src/js/admin/banner/changeImg.js"></script>
<script src="../src/js/admin/banner/submitMainBanner.js"></script>
<script src="../src/js/admin/banner/submit2ndBanner.js"></script>

