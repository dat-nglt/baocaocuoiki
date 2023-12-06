<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin/admin-header.css">
    <link rel="stylesheet" href="css/admin/admin-content.css">
    <link rel="stylesheet" href="css/user/user-header.css">
    <link rel="stylesheet" href="css/user/user-homepage.css">
    <link rel="stylesheet" href="css/user/user-footer.css">
    <link rel="stylesheet" href="css/login/login.css">
    <link rel="stylesheet" href="css/user/detail-product.css">
    <link rel="stylesheet" href="css/admin/detail-account.css">
    <link rel="stylesheet" href="css/user/form-message.css">
    <link rel="stylesheet" href="css/user/user-account.css">
    <link rel="stylesheet" href="css/user/user-cart.css">
    <link rel="stylesheet" href="css/user/user-detail-bill-history.css">
    <link rel="stylesheet" href="css/user/success-order.css">
    <link rel="stylesheet" href="css/user/category-product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Báo Cáo Cuối Kì</title>
</head>
<body>
    <?php
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    include("./model/connect.php");
    include("./model/account.php");
    include("./model/product.php");
    include("./model/classify.php");
    include("./model/bill.php");
    include("./views/user/user-header.php");
    $limitPage = 5;
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'details-product':
                include "./controllers/userControllers/productControllers/detailProduct.php";
                break;
            case 'category-product':
                include "./controllers/userControllers/productControllers/categoryProduct.php";
                break;
            case 'allproduct':
                include "./controllers/userControllers/productControllers/allProduct.php";
                break;
            case 'flashsale':
                include "./controllers/userControllers/productControllers/flashSale.php";
                break;
            case 'hotproduct':
                include "./controllers/userControllers/productControllers/hotProduct.php";
                break;
            case 'login':
                include "./controllers/userControllers/accountControllers/login.php";
                break;
            case 'logout':
                include "./controllers/userControllers/accountControllers/logout.php";
                break;
            case 'profile':
                include "./controllers/userControllers/accountControllers/profile.php";
                break;
            case 'cart':
                include "./controllers/userControllers/otherControllers/cart.php";
                break;
            case 'orderinfo':
                include "./controllers/userControllers/otherControllers/orderInfo.php";
                break;
            case 'success-order':
                include "./controllers/userControllers/otherControllers/success-order.php";
                break;
            case 'history-order':
                include "./controllers/userControllers/otherControllers/historyorder.php";
                break;
            case 'detailbill':
                include "./controllers/userControllers/otherControllers/detailbill.php";
                break;
            default:
                include "./controllers/userControllers/otherControllers/home.php";
                break;
        }
    } else {
        include "./controllers/userControllers/otherControllers/home.php";
    }
    include("./views/user/user-footer.php");
    ?>
</body>

</html>