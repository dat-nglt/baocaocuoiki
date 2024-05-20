<div class="container-form">
    <form action="index.php?page=listclassfity" method="post">
        <input type="text" name="search-input-classfity" id="">
        <button type="submit" name="search-submit-classfity"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <form action="index.php?page=listclassfity" method="post">
        <select id="select-sort" name="sort-select-classfity">
            <option <?php if ($_SESSION['sort-classfity'] === 'desc')
                echo 'selected'; ?> value="desc">Mới Nhất</option>
            <option <?php if ($_SESSION['sort-classfity'] === 'asc')
                echo 'selected'; ?> value="asc">Cũ Nhất</option>
        </select>
        <button type="submit" name="sort-submit-classfity"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>

<div class="page-number addBrand">
    <button class='btn-form js-btnAdd'>Thêm thương hiệu</button>
</div>

<table class="table-account">
    <tr>
        <th style="width: 15%">Mã Thương hiệu</th>
        <th style="width: 45%">Tên Thương hiệu</th>
        <th style="width: 30%">Hình ảnh</th>
        <th style="width: 10%">Tuỳ chọn</th>
    </tr>
    <?php
    foreach ($listClassify as $key => $value) {
        extract($value);
        ?>
        <tr>
            <td>
                <?= $maLoai ?>
            </td>
            <td>
                <?= $tenLoai ?>
            </td>
            <td>
                <img style="witdh: 100px; height: 100px;" src="../src/img/phanLoai/<?= $anhLoai ?>" alt="">
            </td>
            <td>
                <button class='btn-form js-btnForm' data-id='<?= $maLoai ?>'>
                    <i class="fa-solid fa-pen-to-square"></i></button>
                <form style='display: inline;' action="" method='post'
                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa thương hiệu này?');">
                    <input type="hidden" name='idBrand' value="<?= $maLoai ?>">
                    <button type='submit' name='del-brand' class="btn-form"> <i
                            class="fa-solid fa-delete-left fa-rotate-180"></i> </button>
                </form>
            </td>
        </tr>
    <?php }
    ?>
</table>

<div class="modal js-modal">
    <div class="modal-container js-modal-container">
        <div class="modal-close js-modal-close">
            <i class="fa-solid fa-xmark"></i>
        </div>

        <header class="modal-header">
            <i class="fa-solid fa-pen-to-square"></i> Quản lý thương hiệu
        </header>

        <div class="modal-body">
            <form id='form-all' action="index.php?page=listclassfity" method="post" enctype="multipart/form-data">

                <label class='modal-label'>Mã thương hiệu</label>
                <input type="text" class='modal-input' name="brandID" readonly placeholder='Nhập mã thương hiệu...'
                    value="<?php echo $row_up['maLoai'] ?>">

                <label class='modal-label'>Tên thương hiệu</label>
                <input type="text" class='modal-input' name="brandName" required placeholder='Nhập tên thương hiệu...'
                    value="<?php echo $row_up['tenLoai'] ?>">

                <label class='modal-label'>Ảnh thương hiệu</label>
                <input type="file" class='modal-input' name="brandImg" placeholder='Nhập tên thương hiệu...'
                    value="<?php echo $row_up['anhLoai'] ?>">

                <button type="submit" name='submit-modal' class="btn-modal">Cập nhật <i
                        class="fa-solid fa-check"></i></button>

            </form>
        </div>
    </div>
</div>

<div class="modal js-modal-add">
    <div class="modal-container js-modal-container-add">
        <div class="modal-close js-modal-close">
            <i class="fa-solid fa-xmark"></i>
        </div>

        <header class="modal-header">
            <i class="icon-add fa-solid fa-plus"></i> Thêm thương hiệu
        </header>

        <div class="modal-body">
            <form id='form-all' action="index.php?page=listclassfity" method="post" enctype="multipart/form-data">

                <label class='modal-label'>Tên thương hiệu</label>
                <input type="text" class='modal-input' name="brandName" required placeholder='Nhập tên thương hiệu...'>

                <label class='modal-label'>Ảnh thuơng hiệu</label>
                <input type="file" class='modal-input' name="brandImg" placeholder='Nhập tên thương hiệu...'>

                <button type="submit" name='submit-modal-add' class="btn-modal">Thêm <i
                        class="fa-solid fa-check"></i></button>
            </form>
        </div>
    </div>
</div>

<script src="../src/js/modal-brand.js"></script>