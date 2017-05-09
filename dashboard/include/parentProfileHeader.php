<?php
$user = $_SESSION['parent'];

$username = $user->getName()." ".$user->getSurname();
?>

<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="http://demos.creative-tim.com/material-dashboard-pro/assets/img/apple-icon.png" />
<link rel="icon" type="image/png" href="http://demos.creative-tim.com/material-dashboard-pro/assets/img/favicon.png" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Edu Management System - <?= $username ?></title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<!-- Bootstrap core CSS     -->
<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
<!--  Material Dashboard CSS    -->
<link href="../../assets/css/material-dashboard.css" rel="stylesheet" />
<!--     Fonts and icons     -->
<link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
