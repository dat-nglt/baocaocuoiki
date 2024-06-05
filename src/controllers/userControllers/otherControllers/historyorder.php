<?php
if (isset($_SESSION['user'])) {
    $listBill = mysqli_fetch_all(getAllBillUser($conn, $_SESSION['user']['maNguoiDung']));
    include("./views/user/user-history-order.php");
    return;
}
else {
    echo "<script>window.location.href = 'http://localhost/baocaocuoiki/src/';</script>";
    exit();
}
