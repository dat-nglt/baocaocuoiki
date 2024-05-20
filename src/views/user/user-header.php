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
        <a href="index.php"><img src="./img/logo.png" alt="" ></a>
        <a href="index.php">Trang chủ</a>
        <a href="#">Về chúng tôi</a>
        <a href="index.php?page=allproduct">Sản Phẩm</a>
        <a href="index.php?page=flashsale">Flash Sale</a>
    </div>

    <div class="user">
        <form action="index.php?page=allproduct" method="post" id="search-user-header">
            <input type="text" name="name-product" id="" placeholder="Tìm kiếm">
            <button type="submit" name="search-product"><i class="fa-solid fa-magnifying-glass"
                    style="color: rgb(255, 255, 255); cursor: pointer"></i></button>
        </form>
        <?php if (isset($_SESSION['user'])) {
            echo '<a href="index.php?page=cart"><i class="fa-solid fa-cart-shopping" style="color: rgb(255, 255, 255);"></i></a>';
            echo '<div id="profile"><i title="Hồ sơ" class="fa-solid fa-circle-user fa-xl" id="profile-icon" style="cursor: pointer"></i>
                    <ul class="menu-user">' ?>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['quyenTruyCap'] == '2') {
                echo '<li> <a href="http://localhost/baocaocuoiki/admin/index.php">Quản Trị Viên</a> </li>';
            } ?>
            <?php
            echo '          <li> <a href="index.php?page=profile">Hồ Sơ Cá Nhân</a> </li>
                        <li> <a href="index.php?page=history-order">Lịch Sử Đơn Hàng</a> </li>
                        <li> <a href="index.php?page=logout">Đăng Xuất</a> </li>
                    </ul>
                </div>';
        } else { ?>
            <a href="index.php?page=login"><i class="fa-solid fa-circle-user" style="color: rgb(255, 255, 255);"></i></a>
        <?php } ?>
    </div>
</header>