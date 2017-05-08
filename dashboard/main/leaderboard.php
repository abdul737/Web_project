<?php
require_once("DBManager.php");

session_start();

$parent = $_SESSION["parent"];
if(isset($parent))
{
    $students = \databaseManager\DBManager::selectAllStudentsOfParent($parent);
    if ($_POST) {

    }
}
else
{
    echo '<script>alert("Session timed out or not found!");</script>';
    header("Location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">


<head>
    <?php include "include/parentProfileHeader.php"; ?>
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-active-color="blue" data-background-color="black" data-image="http://demos.creative-tim.com/material-dashboard-pro/assets/img/sidebar-3.jpg">
        <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
        <?php include "include/siteLogo.php"; ?>
        <?php include "include/profileWrapper.php"; ?>
    </div>
    <div class="main-panel">

        <?php include "include/parentNavBar.php"; ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Choose</label>
                            <div class="col-sm-3">
                                <select class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                    <option disabled selected>Choose kid</option>
                                    <option value="2">Adiba Alimova</option>
                                    <option value="3">Sardor Alimov</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="selectpicker" data-style="select-with-transition" title="Single Select" data-size="7">
                                    <option disabled selected>Choose course</option>
                                    <option value="2">Math</option>
                                    <option value="3">English</option>
                                </select>
                            </div>
                            <label class="btn btn-info">
                                View
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">grade</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Leader board</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-info">
                                        <th>Name</th>
                                        <th>Course name</th>
                                        <th>Grade</th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Malika</td>
                                            <td>Math</td>
                                            <td>B+</td>
                                        </tr>
                                        <tr>
                                            <td>Sardor</td>
                                            <td>Math</td>
                                            <td>B0</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="#">Edu Management System</a>
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="../../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/material.min.js" type="text/javascript"></script>
<script src="../../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../../assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../../assets/js/nouislider.min.js"></script>
<!-- Select Plugin -->
<script src="../../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../../assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../../assets/js/material-dashboard.js"></script>
<script src="../../assets/js/main.js"></script>


</html>