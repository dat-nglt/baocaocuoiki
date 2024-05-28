<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/index.css">
    <link rel="stylesheet" href="../src/css/admin/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cloudinary-jquery/2.13.1/cloudinary-jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.28/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.28/sweetalert2.css">
    <title>Báo Cáo Cuối Kì</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['user']) && $_SESSION['user']['quyenTruyCap'] == '2') {
    } else {
        header("Location: http://localhost/baocaocuoiki/src/");
        exit();
    }
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    include ("../src/model/connect.php");
    include ("../src/model/account.php");
    include ("../src/model/product.php");
    include ("../src/model/classify.php");
    include ("../src/model/bill.php");
    include ("../src/message.php");
    include ("../src/views/admin/admin-header.php");
    $limitPage = 15;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'listaccounts':
                include "../src/controllers/adminControllers/accountControllers/listAccount.php";
                break;
            case 'listproducts':
                include "../src/controllers/adminControllers/productControllers/listProduct.php";
                break;
            case 'listbills':
                include "../src/controllers/adminControllers/productControllers/listBill.php";
                break;
            case 'listclassify':
                include "../src/controllers/adminControllers/classfityControllers/listClassfity.php";
                break;
            case 'detailbill':
                include "../src/controllers/adminControllers/productControllers/detailBill.php";
                break;
            case 'charts':
                include "../src/controllers/adminControllers/thongKeController.php";
                break;
        }
    } else {
        include "../src/controllers/adminControllers/thongKeController.php";
    }
    ?>
</body>

</html>