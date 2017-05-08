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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">assignment</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Account Info</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-info">
                                        <th>Contract NO.</th>
                                        <th>Course name</th>
                                        <th>Kid name</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Status(paid)</th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>R159874</td>
                                            <td>Math</td>
                                            <td>Sardor</td>
                                            <td>400.000 UZS</td>
                                            <td>10%</td>
                                            <td><i class="material-icons">done</i></td>
                                        </tr>
                                        <tr>
                                            <td>R159475</td>
                                            <td>English</td>
                                            <td>Adiba</td>
                                            <td>200.000 UZS</td>
                                            <td>0%</td>
                                            <td><i class="material-icons">close</i></td>
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
<?php
    include "include/parentProfileFooter.php";
?>
</body>
</html>