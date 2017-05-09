<?php
require_once("databaseManager/DBManager.php");

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
        <?php
            include "include/siteLogo.php";
            include "include/profileWrapper.php";
        ?>
    </div>
    <div class="main-panel">
        <?php
            include "include/top_nav_bar.php";
        ?>
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

                <?php include "include/footer_copyright.html" ?>
        </footer>
    </div>
</div>
<?php include "include/profilefooter.php"; ?>
</body>
</html>