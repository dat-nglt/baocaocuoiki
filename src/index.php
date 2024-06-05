<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin/main.css">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.28/sweetalert2.all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.28/sweetalert2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
    <title>Báo Cáo Cuối Kì</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>

<body>
    <?php
    session_start();
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    include ("./model/connect.php");
    include ("./model/account.php");
    include ("./model/product.php");
    include ("./model/classify.php");
    include ("./model/logistics.php");
    include ("./model/bill.php");
    include ("./model/banner.php");
    include ("./message.php");

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_POST['delete-cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value[0] == $_POST['id-delete']) {
                unset($_SESSION['cart'][$key]);
            }
        }
    }
    include ("./views/user/user-header.php");

    $limitPage = 5;
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
                if (isset($_SESSION['user'])) {
                    include "./controllers/userControllers/otherControllers/home.php";
                    break;
                } else {
                    include "./controllers/userControllers/accountControllers/login.php";
                    break;
                }
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
            case 'forgot-password':
                include "./controllers/userControllers/accountControllers/forgotPassword.php";
                break;
            case 'introduce':
                include ("./views/user/user-webIntro.php");
                break;
            case 'reset-password':
                include "./controllers/userControllers/accountControllers/resetPassword.php";
                break;
            default:
                include "./controllers/userControllers/otherControllers/home.php";
                break;
        }
    } else {
        include "./controllers/userControllers/otherControllers/home.php";
    }

    include ("./views/user/user-footer.php"); ?>
</body>

</html>
