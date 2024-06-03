<?php
if (isset($_SESSION['user'])) {
    include ("./views/user/user-account.php");
    return;
} else {
    include ("./views/user/user-homepage.php");
    return;
}