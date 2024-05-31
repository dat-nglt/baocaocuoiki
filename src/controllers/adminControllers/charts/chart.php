<?php
$_SESSION['filt_option_chart'] = isset($_SESSION['filt_option_chart']) ? $_SESSION['filt_option_chart'] : '';
$_SESSION['sort_chart_date'] = isset($_SESSION['sort_chart_date']) ? $_SESSION['sort_chart_date'] : '7';

$_SESSION['filt_option_chart'] = isset($_POST['filt_option_chart']) ? $_POST['filt_option_chart'] : $_SESSION['filt_option_chart'];
$_SESSION['sort_chart_date'] = isset($_POST['sort_chart_date']) ? $_POST['sort_chart_date'] : $_SESSION['sort_chart_date'];

$logisticsDataChart = mysqli_fetch_all(logisticsChart($conn, $_SESSION['sort_chart_date']));
$billChartData = mysqli_fetch_all(billChart($conn, $_SESSION['sort_chart_date']));


require_once '../src/views/admin/chart/chart.php';