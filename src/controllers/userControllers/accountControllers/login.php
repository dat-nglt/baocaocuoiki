<?php
if (isset($_SESSION['user'])) {
  header("Location: http://localhost/baocaocuoiki/src/index.php");
  exit();
} else {
  include "./views/login/login.php";
}
return;