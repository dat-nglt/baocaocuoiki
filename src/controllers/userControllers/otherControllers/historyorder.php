<?php
if (isset($_SESSION['user'])) {
    $listBill = mysqli_fetch_all(getAllBillUser($conn, $_SESSION['user']['maNguoiDung']));
    include("./views/user/user-history-order.php");
    return;
}
else {
    header('location: index.php');
};
?>