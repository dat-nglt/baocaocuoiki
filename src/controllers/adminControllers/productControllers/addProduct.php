<?php
if(isset($_POST["add-product"])){
    if ($_FILES['hinhSanPham']['name'] != '') {
        $image = $_FILES['hinhSanPham']['name'];
        $image_type = pathinfo($image, PATHINFO_EXTENSION);
        $target_dir = "../src/img/Product/";
        $new_image = md5(uniqid()) . '.' . $image_type;
        $target_file = $target_dir . basename($new_image);
        if(move_uploaded_file($_FILES["hinhSanPham"]["tmp_name"], $target_file)){
            addProduct($conn,$new_image,$_POST['tenSanPham'],$_POST['giaSanPham'],$_POST['soLuong'],$_POST['maLoai'],$_POST['moTa']);
        }
    }else{
        addProduct($conn,'',$_POST['tenSanPham'],$_POST['giaSanPham'],$_POST['soLuong'],$_POST['maLoai'],$_POST['moTa']);
    }
    echo "<script>alert('Thêm thành công!')</script>";
}
$listNameClassify = getNameClassify($conn);
include('../src/views/admin/product/add-product.php');
?>