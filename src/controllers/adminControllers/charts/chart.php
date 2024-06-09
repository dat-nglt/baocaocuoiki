<?php
$_SESSION['start_time_chart'] = isset($_SESSION['start_time_chart']) ?
  $_SESSION['start_time_chart'] :
  '';

$_SESSION['chart_option'] = isset($_SESSION['chart_option']) ?
  $_SESSION['chart_option'] :
  'all';

$_SESSION['end_time_chart'] = isset($_SESSION['end_time_chart']) ?
  $_SESSION['end_time_chart'] :
  '7';

$_SESSION['start_time_chart'] = isset($_POST['start_time_chart']) ?
  $_POST['start_time_chart'] :
  $_SESSION['start_time_chart'];

$_SESSION['chart_option'] = isset($_POST['chart_option']) ?
  $_POST['chart_option'] :
  $_SESSION['chart_option'];

$_SESSION['end_time_chart'] = isset($_POST['end_time_chart']) ?
  $_POST['end_time_chart'] :
  $_SESSION['end_time_chart'];

require_once '../src/views/admin/chart/chart.php';

// Tao đi giặt đồ