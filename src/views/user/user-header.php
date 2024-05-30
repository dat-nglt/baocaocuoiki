<div class="banner-Top">
    <div><img
            src="https://cdn2.cellphones.com.vn/x/https://dashboard.cellphones.com.vn/storage/207x30_TopBanner_Homepage_01.2024_Mb_2-01133.svg"
            alt=""></div>
    <div><img
            src="https://cdn2.cellphones.com.vn/x/https://dashboard.cellphones.com.vn/storage/207x30_TopBanner_Homepage_01.2024_Mb_2-02133.svg"
            alt=""></div>
    <div><img
            src="https://cdn2.cellphones.com.vn/x/https://dashboard.cellphones.com.vn/storage/207x30_TopBanner_Homepage_01.2024_Mb_2-03133.svg"
            alt=""></div>
</div>
<!-- header -->
<header class="container user-header">

    <div class="menu">
        <a href="index.php"><img src="./img/logo.png" alt=""></a>
        <a href="index.php">Trang chủ</a>
        <a href="#">Về chúng tôi</a>
        <a href="index.php?page=allproduct">Sản Phẩm</a>
        <a href="index.php?page=flashsale">Flash Sale</a>
    </div>

    <div class="user">
        <style>
            #search-user-header>fieldset {
                border: 1px solid #fff;
                border-radius: 5px;
                padding: 5px 5px 5px 0;
                display: flex;
            }

            #search-user-header>fieldset>input {
                background: transparent;
                outline: none;
                border: none;
                color: #fff;
                padding-left: 10px;
            }

            #search-user-header>fieldset>input::placeholder {
                color: #fff;
                font-size: 12px;
                font-style: italic;
            }

            #search-user-header>fieldset>button {
                cursor: pointer;
                background: transparent;
                border: none;
                font-size: 15px;
                padding: 2px 10px;
            }
        </style>
        <form action="index.php?page=allproduct" method="post" id="search-user-header">
            <fieldset>
                <!-- <legend>Tìm kiếm sản phẩm</legend> -->
                <input type="text" name="name-product" id="" placeholder="Tìm kiếm sản phẩm">
                <button type="submit" name="search-product"><i class="fa-solid fa-magnifying-glass"
                        style="color: rgb(255, 255, 255); cursor: pointer"></i></button>
            </fieldset>
        </form>
        <a href="index.php?page=cart" style="position: relative;">
            <i class="fa-solid fa-cart-shopping" style="color: rgb(255, 255, 255);"></i>
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                <span
                    style="position: absolute; font-size: 14px; background: #f90000; width: 20px; height: 19px; text-align: center; color: #fff; font-weight: 600; border-radius: 50%; top: -3px; left: 20px;">
                    <?php echo count($_SESSION['cart']); ?>
                </span>
            <?php } ?>
        </a>
        <?php if (isset($_SESSION['user'])) {

            echo '<div id="profile"><a href="index.php?page=profile"><i title="Hồ sơ" class="fa-solid fa-user" id="profile-icon" style="color: rgb(255, 255, 255); cursor: pointer"></i></a>
                    <ul class="menu-user">' ?>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['quyenTruyCap'] == '2') {
                echo '<li> <a target="_blank" href="http://localhost/baocaocuoiki/admin/index.php?page=charts">Quản Trị Viên</a> </li>';
            } ?>
            <?php
            echo '          <li> <a href="index.php?page=profile">Hồ Sơ Cá Nhân</a> </li>
                        <li> <a href="index.php?page=history-order">Lịch Sử Đơn Hàng</a> </li>
                        <li> <a href="index.php?page=logout">Đăng Xuất</a> </li>
                    </ul>
                </div>';
        } else { ?>
            <a href="index.php?page=login"><i class="fa-solid fa-user" style="color: rgb(255, 255, 255);"></i></a>
        <?php } ?>
    </div>
</header>