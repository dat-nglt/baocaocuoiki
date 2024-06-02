<?php
include ("./serviceAjax.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['sessionOTP'] = isset($_POST['sessionOTP']) ? $_POST['sessionOTP'] : null;
  responseMessage('warning', $_SESSION['sessionOTP'], '');
}
