<?php
if (isset($_SESSION['sessionOTP'])) {
  include "./views/login/resetPassword.php";
} else {
  header("Location: http://localhost/baocaocuoiki/src/index.php?page=login");
  exit();
}
