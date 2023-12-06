<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/index.css">
    <link rel="stylesheet" href="../src/css/admin/admin-header.css">
    <link rel="stylesheet" href="../src/css/admin/admin-content.css">
    <link rel="stylesheet" href="../src/css/admin/detail-account.css">
    <link rel="stylesheet" href="../src/css/admin/list-all.css">
    <link rel="stylesheet" href="../src/css/admin/detail-bill.css">
    <link rel="stylesheet" href="../src/css/admin/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Báo Cáo Cuối Kì</title>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['user'])&&$_SESSION['user']['quyenTruyCap']=='2'){
     } else{
            header("Location: http://localhost/baocaocuoiki/src/index.php");
            exit();
        }
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    include("../src/model/connect.php");
    include("../src/model/account.php");
    include("../src/model/product.php");
    include("../src/model/classify.php");
    include("../src/model/bill.php");
    include("../src/views/admin/admin-header.php");
    $limitPage = 10;
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
            case 'detailAccount':
                include "../src/controllers/adminControllers/accountControllers/detailAccount.php";
                break;
            case 'detailProduct':
                include "../src/controllers/adminControllers/productControllers/detailProduct.php";
                break;
            case 'addProduct':
                include "../src/controllers/adminControllers/productControllers/addProduct.php";
                break;
            case 'listclassfity':
                include "../src/controllers/adminControllers/classfityControllers/listClassfity.php";
                break; 
            case 'detailbill':
                include('../src/views/admin/bill/detail-bill.php');
                break;
        }
    } else{
        include "../src/controllers/adminControllers/thongKeController.php";
    }
    ?>
</body>

</html>