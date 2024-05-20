<?php
if (isset($_GET["id1"]) && $_GET["id1"] > 0) {
    if (isset($_POST["save-product"])) {
        if ($_FILES['hinhSanPham']['name'] != '') {
            $image = $_FILES['hinhSanPham']['name'];
            $image_type = pathinfo($image, PATHINFO_EXTENSION);
            $target_dir = "../src/img/Product/";
            $new_image = md5(uniqid()) . '.' . $image_type;
            $target_file = $target_dir . basename($new_image);
            if (move_uploaded_file($_FILES["hinhSanPham"]["tmp_name"], $target_file)) {
                updateProduct($conn, $_GET["id"], $_POST['tenSanPham'], $_POST['giaSanPham'], $_POST['soLuong'], $_POST['loaiSanPham'], $_POST['moTa'], $new_image, $_POST['thoiGian'], $_POST['giaGiam']);
            }
        } else {
            updateProduct($conn, $_GET["id"], $_POST['tenSanPham'], $_POST['giaSanPham'], $_POST['soLuong'], $_POST['loaiSanPham'], $_POST['moTa'], '', $_POST['thoiGian'], $_POST['giaGiam']);
        }
        echo "<script>alert('Cập nhật thông tin sản phẩm thành công!')</script>";
    }
    $listNameClassify = getNameClassify($conn);
    $detailProduct = mysqli_fetch_assoc(getOneProduct($conn, $_GET["id1"]));
    include ('../src/views/admin/product/detail-product.php');
} else {
    header('Location: index.php?page=listproducts');
    exit();
}

?>