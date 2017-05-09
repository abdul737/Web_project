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
    <?php
        include "include/parentProfileHeader.php";
    ?>
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

            <?php include "include/footer_copyright.html" ?>
        </footer>
    </div>
</div>
<?php
    include "include/profilefooter.php";
?>
</body>
</html>