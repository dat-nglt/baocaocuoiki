<?php
if (isset($_SESSION['user'])) {
    session_destroy();
    session_unset();
    include ("./views/login/login.php");
    successTimeout('Đăng xuất thành công', 'http://localhost/baocaocuoiki/src/index.php?page=login');
}
?>