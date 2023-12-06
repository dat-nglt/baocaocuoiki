<?php
if (isset($_POST['search-submit-classfity'])) {
    $_SESSION['search-classfity'] = $_POST['search-input-classfity'];
}
if (isset($_POST['sort-submit-classfity'])) {
    $_SESSION['sort-classfity'] = $_POST['sort-select-classfity'];
}
$_SESSION['search-classfity'] = isset($_SESSION['search-classfity']) ? $_SESSION['search-classfity'] : '';
$_SESSION['sort-classfity'] = isset($_SESSION['sort-classfity']) ? $_SESSION['sort-classfity'] : 'desc';

if (isset($_POST['del-brand'])) {

    delOneClassify($conn, $_POST['idBrand']);
}

$listClassify = getClassify($conn,$_SESSION['search-classfity'],$_SESSION['sort-classfity']);
error_reporting(0);
$id = $_GET["id"];
$sql_up = "SELECT * FROM phanloai WHERE maLoai = '$id'";
$result_sql = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_assoc($result_sql);

if(isset($_POST['submit-modal'])){
    $brandname = $_POST['brandName'];
    $brandid = $_POST['brandID'];
    if($_FILES["brandImg"]["name"]!=''){
        $image = $_FILES['brandImg']['name'];
        $image_type = pathinfo($image, PATHINFO_EXTENSION);
        $target_dir = "../src/img/phanLoai/";
        $new_image = md5(uniqid()) . '.' . $image_type;
        $target_file = $target_dir . basename($new_image);
        if(move_uploaded_file($_FILES["brandImg"]["tmp_name"], $target_file)){
            $sql_up = "UPDATE phanloai SET tenLoai = '$brandname', anhLoai = '$new_image' WHERE maLoai = $brandid";
            $listClassify_Up = mysqli_query($conn, $sql_up);
            header("Location: index.php?page=listclassfity");
            exit();
        }
    }else{
        $sql_ip = "UPDATE phanloai SET tenLoai = '$brandname' WHERE maLoai = $brandid";
        $listClassify_Up = mysqli_query($conn, $sql_up);
        header("Location: index.php?page=listclassfity");
        exit();
    }
}
if(isset($_POST['submit-modal-add'])){
    $brandname = $_POST['brandName'];
    $brandid = $_POST['brandID'];
    if($_FILES["brandImg"]["name"]!=''){
        $image = $_FILES['brandImg']['name'];
        $image_type = pathinfo($image, PATHINFO_EXTENSION);
        $target_dir = "../src/img/phanLoai/";
        $new_image = md5(uniqid()) . '.' . $image_type;
        $target_file = $target_dir . basename($new_image);
        if(move_uploaded_file($_FILES["brandImg"]["tmp_name"], $target_file)){
            $sql_add = "INSERT INTO phanloai (tenLoai, anhLoai) 
            VALUES ('$brandname', '$new_image');";
            $listClassifyAdd = mysqli_query($conn, $sql_add);
            include('../src/views/admin/classfity/list-classfity.php');
            return;
        }
    }else{
        $sql_add = "INSERT INTO phanloai (tenLoai, anhLoai) 
        VALUES ('$brandname', '');";
        $listClassifyAdd = mysqli_query($conn, $sql_add);
        include('../src/views/admin/classfity/list-classfity.php');
            return;
    }
}
include('../src/views/admin/classfity/list-classfity.php');
?>